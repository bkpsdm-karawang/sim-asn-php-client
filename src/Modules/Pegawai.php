<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;

/**
 * @method mixed getList(array $query = [])
 * @method mixed getDetail($id)
 * @method mixed getHierarki($id)
 * @method mixed getKartuIdentitas($id)
 * @method mixed getKontak($id)
 * @method mixed getAlamat($id)
 * @method mixed getKeluarga($id)
 * @method mixed getRiwayatKeluarga($id)
 * @method mixed getRiwayatGolongan($id)
 * @method mixed getRiwayatJabatan($id)
 * @method mixed getRiwayatPendidikan($id)
 * @method mixed getRiwayatDiklat($id)
 * @method mixed getRiwayatPelanggaran($id)
 * @method mixed getDokumen($id)
 * @method mixed getFile($id)
 */
class Pegawai extends Client
{
    /**
     * requests.
     *
     * @var array
     */
    protected $requests = [
        'getList' => \SIM_ASN\Request\Pegawai\Listing::class,
        'getDetail' => \SIM_ASN\Request\Pegawai\Detail::class,
        'getHierarki' => \SIM_ASN\Request\Pegawai\Hierarki::class,
        'getKartuIdentitas' => \SIM_ASN\Request\Pegawai\KartuIdentitas::class,
        'getKontak' => \SIM_ASN\Request\Pegawai\Kontak::class,
        'getAlamat' => \SIM_ASN\Request\Pegawai\Alamat::class,
        'getKeluarga' => \SIM_ASN\Request\Pegawai\Keluarga::class,
        'getRiwayatKeluarga' => \SIM_ASN\Request\Pegawai\RiwayatKeluarga::class,
        'getRiwayatGolongan' => \SIM_ASN\Request\Pegawai\RiwayatGolongan::class,
        'getRiwayatJabatan' => \SIM_ASN\Request\Pegawai\RiwayatJabatan::class,
        'getRiwayatPendidikan' => \SIM_ASN\Request\Pegawai\RiwayatPendidikan::class,
        'getRiwayatDiklat' => \SIM_ASN\Request\Pegawai\RiwayatDiklat::class,
        'getRiwayatPelanggaran' => \SIM_ASN\Request\Pegawai\RiwayatPelanggaran::class,
        'getDokumen' => \SIM_ASN\Request\Pegawai\Dokumen::class,
        'getFile' => \SIM_ASN\Request\Pegawai\File::class,
    ];
}
