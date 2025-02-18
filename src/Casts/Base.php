<?php

namespace SIM_ASN\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

abstract class Base implements CastsAttributes
{
    /**
     * Model.
     *
     * @var string
     */
    protected $model;

    /**
     * cast field.
     *
     * @var Model
     */
    protected $instance;

    /**
     * cast prefix.
     */
    protected $castPrefix;

    /**
     * Create a new cast class instance.
     *
     * @param string $model
     *
     * @return void
     */
    public function __construct($model, Model $instance)
    {
        $this->model = $model;
        $this->instance = $instance;
        $this->castPrefix = $instance->castPrefix ? "{$instance->castPrefix}.{$instance->key}" : $instance->key;
    }
}
