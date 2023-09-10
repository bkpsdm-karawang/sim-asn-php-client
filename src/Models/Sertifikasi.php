<?php

namespace SIM_ASN\Models;

class Sertifikasi extends Base
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
