<?php

namespace SIM_ASN\Casts;

use Illuminate\Support\Collection as Illuminate;

class Collection extends Base
{
    /**
     * Transform the attribute from the underlying model values.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if (isset($attributes[$key])) {
            $data = json_decode($attributes[$key], true);

            return new Illuminate(array_map(function ($item) use ($key) {
                return new $this->model($item, $this->instance->castField, $key, $this->castPrefix);
            }, $data));
        }

        return null;
    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if (!$value) {
            return json_encode([]);
        }

        $transform = function ($item) use ($key) {
            return new $this->model($item, $this->instance->castField, $key, $this->castPrefix);
        };

        if ($value instanceof Illuminate) {
            $value = array_map($transform, $value->toArray());
        } elseif (is_array($value)) {
            $value = array_map($transform, $value);
        }

        return json_encode($value);
    }
}
