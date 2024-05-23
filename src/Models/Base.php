<?php

namespace SIM_ASN\Models;

use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Database\Eloquent\Model;
use SIM_ASN\Casts\Collection as CollectionCasting;
use SIM_ASN\Casts\Model as ModelCasting;

abstract class Base extends Model implements Castable
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = [];

    /**
     * Get the caster class to use when casting from / to this cast target.
     *
     * @return object|string
     */
    public static function castUsing(array $arguments)
    {
        if (count($arguments) && 'collection' === $arguments[0]) {
            return new CollectionCasting(static::class);
        }

        return new ModelCasting(static::class);
    }
}
