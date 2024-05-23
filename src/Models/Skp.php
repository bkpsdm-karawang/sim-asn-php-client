<?php

namespace SIM_ASN\Models;

class Skp extends Base
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return ['dokumen' => Dokumen::class];
    }
}
