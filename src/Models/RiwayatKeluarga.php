<?php

namespace SIM_ASN\Models;

class RiwayatKeluarga extends Base
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'keluarga' => Keluarga::class,
            'dokumen' => Dokumen::class,
        ];
    }
}
