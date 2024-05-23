<?php

namespace SIM_ASN\Models;

class Golongan extends Base
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'referensi' => Ref\Golongan::class,
            'dokumen' => Dokumen::class,
        ];
    }
}
