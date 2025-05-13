<?php

namespace SIM_ASN\Auth;

use Illuminate\Contracts\Auth\UserProvider as LaravelUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Http;
use SIM_ASN\Laravel\ServiceProvider;
use SIM_ASN\Models\User;

class UserProvider implements LaravelUserProvider
{
    public function retrieveById($identifier)
    {
        // Not used in token-based authentication
    }

    public function retrieveByToken($identifier, $token, $virtualId = null)
    {
        $url = config(ServiceProvider::CONFIG_KEY.'.url');
        $profileUrl = config(ServiceProvider::CONFIG_KEY.'.profile_url');
        $appKey = config(ServiceProvider::CONFIG_KEY.'.app_key');

        $headers = ['x-app-key' => $appKey];
        if ($virtualId) {
            $headers['x-virtual-user-id'] = $virtualId;
        }

        $response = Http::baseUrl($url)->withHeaders($headers)->withToken($token)->get($profileUrl);

        if ($response->successful()) {
            $userData = $response->json();
            return $this->createUser($userData['data']);
        }

        return null;
    }

    protected function createUser(array $data): User
    {
        return new User($data);
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Not implemented
    }

    public function retrieveByCredentials(array $credentials)
    {
        // Not used in token-based authentication
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // Not used in token-based authentication
    }

    public function rehashPasswordIfRequired(Authenticatable $user, #[\SensitiveParameter] array $credentials, bool $force = false)
    {
        // Not implemented
    }
}
