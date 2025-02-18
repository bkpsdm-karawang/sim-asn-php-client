<?php

namespace SIM_ASN\Models;

use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SIM_ASN\Casts\Collection as CollectionCasting;
use SIM_ASN\Casts\Model as ModelCasting;
use SIM_ASN\Laravel\ServiceProvider;

abstract class Base extends Model implements Castable
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = [];

    /**
     * cast field.
     *
     * @var bool
     */
    public $castField = true;

    /**
     * key.
     */
    public $key;

    /**
     * cast prefix.
     */
    public $castPrefix;

    /**
     * Create a new Eloquent model instance.
     *
     * @return void
     */
    public function __construct(array $attributes = [], bool $castField = true, $key = null, $castPrefix = null)
    {
        $this->castField = $castField;
        $this->key = $key ?? $this->getTable();
        $this->castPrefix = $castPrefix;

        if ($this->castField) {
            $fields = ServiceProvider::config('cast_fields', []);

            if ($castPrefix && isset($fields["{$castPrefix}.{$this->key}"])) {
                $this->fillable($fields["{$castPrefix}.{$this->key}"]);
            } elseif (isset($fields[$this->key])) {
                $this->fillable($fields[$this->key]);
            }
        }

        parent::__construct($attributes);
    }

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return $this->table ?? Str::snake(class_basename($this));
    }

    /**
     * Get the caster class to use when casting from / to this cast target.
     *
     * @return object|string
     */
    public static function castUsing(array $arguments)
    {
        $model = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2)[1]['object'];

        return count($arguments) && 'collection' === $arguments[0]
            ? new CollectionCasting(static::class, $model)
            : new ModelCasting(static::class, $model);
    }
}
