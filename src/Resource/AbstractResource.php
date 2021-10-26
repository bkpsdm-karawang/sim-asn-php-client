<?php

namespace SIM_ASN\Resource;

use Illuminate\Support\Str;

class AbstractResource
{
    /**
     * data token
     *
     * @var array
     */
    protected $data = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * get data
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * on call
     */
    public function __call($name, $arguments)
    {
        if (Str::startsWith($name, 'get')) {
            $key = Str::snake(Str::replace('get', '', $name));
            if (array_key_exists($key, $this->data)) {
                return $this->data[$key];
            }
        }

        return null;
    }
}
