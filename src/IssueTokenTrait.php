<?php

namespace SIM_ASN;

trait IssueTokenTrait
{
    /**
     * build form data for issue token
     */
    protected function buildFormToken(string $code): array
    {
        return [
            'grant_type' => 'authorization_code',
            'client_id' => $this->config['client_id'],
            'client_secret' => $this->config['client_secret'],
            'redirect_uri' => $this->config['oauth_callback'],
            'scope' => $this->config['user_scope'],
            'code' => $code
        ];
    }

    /**
     * build form data for refresh token
     */
    protected function buildFormRefreshToken(string $refreshToken): array
    {
        return [
            'grant_type' => 'refresh_token',
            'client_id' => $this->config['client_id'],
            'client_secret' => $this->config['client_secret'],
            'scope' => $this->config['user_scope'],
            'refresh_token' => $refreshToken
        ];
    }
}
