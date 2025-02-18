<?php

namespace SIM_ASN\Casts;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends Base
{
    /**
     * Transform the attribute from the underlying model values.
     *
     * @param EloquentModel $model
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if (isset($attributes[$key])) {
            $data = json_decode($attributes[$key], true);

            return new $this->model($data, $this->instance->castField, $key, $this->castPrefix);
        }

        return null;
    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param EloquentModel $model
     */
    public function set($model, string $key, $value, array $attributes): ?string
    {
        if ($value instanceof EloquentModel || is_array($value)) {
            $valueArray = $value instanceof EloquentModel
                ? $value->toArray()
                : (new $this->model($value, $this->instance->castField, $key, $this->castPrefix))->toArray();

            return json_encode($valueArray);
        }

        return null;
    }
}
