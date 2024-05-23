<?php

namespace SIM_ASN\Models;

class Jabatan extends Base
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'skpd' => Skpd::class,
            'unit_kerja' => UnitKerja::class,
            'golongan' => Golongan::class,
            'referensi' => Ref\Jabatan::class,
            'dokumen' => Dokumen::class,
            'pejabat' => Pegawai::class,
        ];
    }
}
