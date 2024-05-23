<?php

namespace SIM_ASN\Models;

class Pelanggaran extends Base
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'dokumen' => Dokumen::class,
            'user' => User::class,
            'vonis' => VonisHukuman::class,
        ];
    }
}
