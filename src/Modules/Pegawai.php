<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;

/**
 * @method \Illuminate\Pagination\LengthAwarePaginator getList(array $query = [])
 * @method \SIM_ASN\Models\Pegawai                     getDetail($id)
 * @method \SIM_ASN\Models\Hierarki                    getHierarki($id)
 * @method \Illuminate\Support\Collection              getKartuIdentitas($id)
 * @method \Illuminate\Support\Collection              getKontak($id)
 * @method \Illuminate\Support\Collection              getAlamat($id)
 * @method \Illuminate\Support\Collection              getKeluarga($id)
 * @method \Illuminate\Support\Collection              getRiwayatKeluarga($id)
 * @method \Illuminate\Support\Collection              getRiwayatGolongan($id)
 * @method \Illuminate\Support\Collection              getRiwayatJabatan($id)
 * @method \Illuminate\Support\Collection              getRiwayatPendidikan($id)
 * @method \Illuminate\Support\Collection              getRiwayatDiklat($id)
 * @method \Illuminate\Support\Collection              getRiwayatPelanggaran($id)
 * @method \Illuminate\Support\Collection              getRiwayatSertifikasi($id)
 * @method \Illuminate\Support\Collection              getRiwayatInovasi($id)
 * @method \Illuminate\Support\Collection              getDokumen($id)
 * @method \Illuminate\Support\Collection              getFile($id)
 * @method array                                       getCompleteness($id)
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
        'getRiwayatSertifikasi' => \SIM_ASN\Request\Pegawai\RiwayatSertifikasi::class,
        'getRiwayatInovasi' => \SIM_ASN\Request\Pegawai\RiwayatInovasi::class,
        'getRiwayatLhk' => \SIM_ASN\Request\Pegawai\RiwayatLhk::class,
        'getRiwayatSkp' => \SIM_ASN\Request\Pegawai\RiwayatSkp::class,
        'getDokumen' => \SIM_ASN\Request\Pegawai\Dokumen::class,
        'getFile' => \SIM_ASN\Request\Pegawai\File::class,
        'getCompleteness' => \SIM_ASN\Request\Pegawai\Completeness::class,
    ];
}
