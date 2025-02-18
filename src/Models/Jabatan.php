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
            'golongan' => Golongan::class,
            'referensi' => Ref\Jabatan::class,
            'dokumen' => Dokumen::class,
        ];
    }
}
