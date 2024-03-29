<?php

namespace SIM_ASN\Models;

use SIM_ASN\Models\Ref\Jabatan;

class Hierarki extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'atasan' => Pegawai::class,
        'jabatan_atasan' => Jabatan::class,
        'bawahan' => Pegawai::class.':collection'
    ];
}
