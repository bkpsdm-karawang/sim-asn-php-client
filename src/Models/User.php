<?php

namespace SIM_ASN\Models;

class User extends Base
{
    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['is_default_password', 'services'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'pegawai' => Pegawai::class,
        'skpd' => Skpd::class,
        'unit_kerja' => UnitKerja::class
    ];
}
