<?php

namespace SIM_ASN\Models;

class Lhk extends Base
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return ['file' => File::class];
    }
}
