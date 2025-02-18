<?php

namespace SIM_ASN\Models;

class Pegawai extends Base
{
    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

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
            'pendidikan_terakhir' => Pendidikan::class,
            'golongan' => Golongan::class,
            'jabatan' => Jabatan::class.':collection',
            'as_jabatan' => Jabatan::class,
            'dokumen_masuk' => Dokumen::class,
            'dokumen_berhenti' => Dokumen::class,
            'alamat' => Alamat::class.':collection',
            'kartu_identitas' => KartuIdentitas::class.':collection',
            'kontak' => Kontak::class.':collection',
            'keluarga' => Keluarga::class.':collection',
        ];
    }
}
