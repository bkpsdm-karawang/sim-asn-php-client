<?php

namespace SIM_ASN\Models;

use SIM_ASN\Casts\Model as ModelCasting;
use SIM_ASN\Casts\Collection as CollectionCasting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Castable;

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
     * @param  array  $arguments
     * @return object|string
     */
    public static function castUsing(array $arguments)
    {
        if (count($arguments) && $arguments[0] === 'collection') {
            return new CollectionCasting(static::class);
        }

        return new ModelCasting(static::class);
    }
}
