<?php

namespace SIM_ASN;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use SIM_ASN\Laravel\Facades\UserClient;
use SIM_ASN\Laravel\ServiceProvider;
use SIM_ASN\Request\Oauth;

class OauthClient extends Client
{
    /**
     * requests.
     *
     * @var array
     */
    protected $requests = [
        'requestAccessToken' => Oauth\AccessToken::class,
        'requestRefreshTokenToken' => Oauth\RefreshToken::class,
        'requestAppToken' => Oauth\AppToken::class,
    ];

    /**
     * handle callback with redirect.
     *
     * @return RedirectResponse|array
     */
    public function requestCode($state = 'login')
    {
        $url = ServiceProvider::config('frontend_url').'/oauth/authorize';

        $query = [
            'client_id' => ServiceProvider::config('client_id'),
            'redirect_uri' => ServiceProvider::config('user_callback'),
            'response_type' => 'code',
            'scope' => ServiceProvider::config('user_scope'),
            'state' => $state,
        ];

        return new RedirectResponse($url.'?'.http_build_query($query));
    }

    /**
     * handle callback with redirect.
     *
     * @return RedirectResponse|array
     */
    public function handleCallback(Request $request, ?\Closure $createToken = null)
    {
        if ($request->has('error')) {
            return $this->redirect($request->state, 'error', $request->query('error'));
        }

        try {
            $accessToken = $this->requestAccessToken($request->code);
            $user = UserClient::setAccessToken($accessToken)->getUser();

            if (isset($createToken) && is_callable($createToken)) {
                $token = $createToken($user, $accessToken);

                if ($token) {
                    return $this->redirect($request->state, 'access_token', $token);
                }

                return $this->redirect($request->state, 'error', 'User not found');
            }

            return [$user, $accessToken];
        } catch (ClientException $error) {
            return $this->redirect($request->state, 'error', $error->getMessage());
        }
    }

    /**
     * redirect to frontend after login or connect simpeg.
     */
    protected function redirect($state = 'login', string $key, string $message = 'No message'): RedirectResponse
    {
        $redirects = ServiceProvider::config('user_redirect_state');

        if (array_key_exists($state, $redirects)) {
            return new RedirectResponse($redirects[$state]."?{$key}={$message}");
        }

        throw new \InvalidArgumentException("Redirect state {$state} not defined");
    }
}
