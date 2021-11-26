<?php

namespace SIM_ASN\Models;

class Golongan extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'referensi' => Ref\Golongan::class,
        'dokumen' => Dokumen::class
    ];
}
