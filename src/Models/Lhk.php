<?php

namespace SIM_ASN\Models;

class Lhk extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'file' => File::class
    ];
}
