<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;

/**
 * @method mixed getDetail($id)
 * @method mixed getHierarki($id)
 * @method mixed getKartuIdentitas($id)
 * @method mixed getKontak($id)
 * @method mixed getAlamat($id)
 * @method mixed getKeluarga($id)
 * @method mixed getPendidikan($id)
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
