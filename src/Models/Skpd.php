<?php

namespace SIM_ASN\Models;

class Skpd extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'pejabat_kepala' => Pegawai::class.':collection',
        'jabatan_kepala' => Jabatan::class,
        'admin' => User::class.':collection',
    ];
}
