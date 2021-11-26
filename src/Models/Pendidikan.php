<?php

namespace SIM_ASN\Models;

class Pendidikan extends Base
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tingkat' => TingkatPendidikan::class,
        'instansi' => InstansiPendidikan::class,
        'jurusan' => JurusanPendidikan::class,
        'dokumen' => Dokumen::class
    ];
}
