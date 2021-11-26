<?php

namespace SIM_ASN\Models;

class Jabatan extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'skpd' => Skpd::class,
        'unit_kerja' => UnitKerja::class,
        'golongan' => Golongan::class,
        'referensi' => Ref\Jabatan::class,
        'dokumen' => Dokumen::class,
        'pejabat' => Pegawai::class
    ];
}
