<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;

/**
 * @method \SIM_ASN\Models\Skpd                        getDetail($id)
 * @method \Illuminate\Support\Collection              getHierarki($id)
 * @method \Illuminate\Pagination\LengthAwarePaginator getKartuIdentitas($id)
 * @method \Illuminate\Pagination\LengthAwarePaginator getKontak($id)
 * @method \Illuminate\Pagination\LengthAwarePaginator getAlamat($id)
 * @method \Illuminate\Pagination\LengthAwarePaginator getKeluarga($id)
 * @method \Illuminate\Pagination\LengthAwarePaginator getPendidikan($id)
 */
class Skpd extends Client
{
    /**
     * requests.
     *
     * @var array
     */
    protected $requests = [
        'getDetail' => \SIM_ASN\Request\Skpd\Detail::class,
        'getHierarki' => \SIM_ASN\Request\Skpd\Hierarki::class,
        'getKartuIdentitas' => \SIM_ASN\Request\Skpd\KartuIdentitas::class,
        'getKontak' => \SIM_ASN\Request\Skpd\Kontak::class,
        'getAlamat' => \SIM_ASN\Request\Skpd\Alamat::class,
        'getKeluarga' => \SIM_ASN\Request\Skpd\Keluarga::class,
        'getPendidikan' => \SIM_ASN\Request\Skpd\Pendidikan::class,
    ];
}
