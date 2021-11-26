<?php

namespace SIM_ASN\Models;

class Pelanggaran extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'dokumen' => Dokumen::class,
        'user' => User::class,
        'vonis' => VonisHukuman::class
    ];
}
