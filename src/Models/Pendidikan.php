<?php

namespace SIM_ASN\Models;

class Pendidikan extends Base
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tingkat' => TingkatPendidikan::class,
            'instansi' => InstansiPendidikan::class,
            'jurusan' => JurusanPendidikan::class,
            'dokumen' => Dokumen::class,
        ];
    }
}
