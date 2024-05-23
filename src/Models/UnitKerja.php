<?php

namespace SIM_ASN\Models;

class UnitKerja extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'skpd' => Skpd::class,
        'sub_unit_kerja' => self::class.':collection',
        'pejabat_kepala' => Pegawai::class.':collection',
        'jabatan_kepala' => Jabatan::class,
        'admin' => User::class.':collection',
    ];
}
