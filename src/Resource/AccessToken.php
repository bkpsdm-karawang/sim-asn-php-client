<?php

namespace SIM_ASN\Resource;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;
use SIM_ASN\Laravel\Facades\OauthClient;

class AccessToken extends AbstractResource implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param mixed                               $value
     * @param array                               $attributes
     *
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        if ($value) {
            return new static(json_decode($value, true));
        }

        return null;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param array                               $value
     * @param array                               $attributes
     *
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        if ($value instanceof static) {
            return json_encode($value->toArray());
        }

        throw new InvalidArgumentException('Value not instance of AcessToken class');
    }

    /**
     * refresh.
     */
    public function refresh(): AccessToken
    {
        return OauthClient::requestRefreshTokenToken($this->refresh_token);
    }

    /**
     * cast to string.
     */
    public function __toString(): string
    {
        if (array_key_exists('access_token', $this->data)) {
            return $this->data['access_token'];
        }

        throw new \Exception('Token is not exists');
    }
}
