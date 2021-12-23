<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;

/**
 * @method \SIM_ASN\Models\Skpd getDetail($id)
 * @method \Illuminate\Support\Collection getHierarki($id)
 * @method \ElemenX\ApiPagination\Bridges\LengthAwarePaginator getKartuIdentitas($id)
 * @method \ElemenX\ApiPagination\Bridges\LengthAwarePaginator getKontak($id)
 * @method \ElemenX\ApiPagination\Bridges\LengthAwarePaginator getAlamat($id)
 * @method \ElemenX\ApiPagination\Bridges\LengthAwarePaginator getKeluarga($id)
 * @method \ElemenX\ApiPagination\Bridges\LengthAwarePaginator getPendidikan($id)
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
