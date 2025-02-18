<?php

namespace SIM_ASN\Models\Ref;

use SIM_ASN\Models\Base;
use SIM_ASN\Models\Skpd;
use SIM_ASN\Models\UnitKerja;

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
        ];
    }
}
