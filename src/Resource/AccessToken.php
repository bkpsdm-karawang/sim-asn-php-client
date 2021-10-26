<?php

namespace SIM_ASN\Resource;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class AccessToken extends AbstractResource implements CastsAttributes
{
    /**
     * day before expire
     *
     * @var int
     */
    protected $refreshTokenDay = 7;

    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        return new static(json_decode($value, true));
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        if ($value instanceof static) {
            return json_encode($value->getData());
        }

        throw new InvalidArgumentException('Value not instance of AcessToken class');
    }

    /**
     * cast to string
     */
    public function __toString(): string
    {
        if (array_key_exists('access_token', $this->data)) {
            return $this->data['access_token'];
        }

        throw new \Exception('Token is not exists');
    }
}
