<?php

namespace SIM_ASN\Models;

class Diklat extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'dokumen' => Dokumen::class
    ];
}
