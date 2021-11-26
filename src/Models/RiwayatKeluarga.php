<?php

namespace SIM_ASN\Models;

class RiwayatKeluarga extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'keluarga' => Keluarga::class,
        'dokumen' => Dokumen::class
    ];
}
