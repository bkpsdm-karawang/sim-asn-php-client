<?php

namespace SIM_ASN;

use Closure;
use GuzzleHttp\Psr7\Response;
use SIM_ASN\Request\Base as BaseRequest;

/**
 * @method static \SIM_ASN\UserClient getProfile(): \SIM_ASN\Resource\User
 */
class UserClient extends Client
{
    /**
     * on refresh token handler.
     *
     * @var Clouser
     */
    protected $onRefreshTokenHandler;

    /**
     * requests.
     *
     * @var array
     */
    protected $requests = [
        'getProfile' => \SIM_ASN\Request\User\Profile::class,
    ];

    /**
     * on refresh token.
     */
    public function onRefreshToken(Closure $onSave): void
    {
        $this->onRefreshTokenHandler = $onSave;
    }

    /**
     * handle client exception.
     */
    protected function handleException(int $status, $data, BaseRequest $request, Response $response)
    {
        if (401 === $status && $this->refreshableToken()) {
            try {
                $freshToken = $this->accessToken->refresh();
                $onSave = $this->onRefreshTokenHandler;
                $onSave($freshToken);

                if (!is_null($this->currentProcess)) {
                    return $this->retryProcess($freshToken);
                }
            } catch (\Exception $error) {
                return parent::handleException($status, $data, $request, $response);
            }
        }

        return parent::handleException($status, $data, $request, $response);
    }

    /**
     * determine is token refreshable.
     */
    protected function refreshableToken(): bool
    {
        return isset($this->accessToken) && isset($this->onRefreshTokenHandler);
    }
}
