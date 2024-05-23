<?php

namespace SIM_ASN\Models;

use SIM_ASN\Models\Ref\Jabatan;

class Hierarki extends Base
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'atasan' => Pegawai::class,
            'jabatan_atasan' => Jabatan::class,
            'bawahan' => Pegawai::class.':collection',
        ];
    }
}
