<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;

/**
 * @method mixed getDetail($idSkpd, $id)
 * @method mixed getHierarki($idSkpd, $id)
 * @method mixed getKartuIdentitas($idSkpd, $id)
 * @method mixed getKontak($idSkpd, $id)
 * @method mixed getAlamat($idSkpd, $id)
 * @method mixed getKeluarga($idSkpd, $id)
 * @method mixed getPendidikan($idSkpd, $id)
 */
class UnitKerja extends Client
{
    /**
     * requests.
     *
     * @var array
     */
    protected $requests = [
        'getDetail' => \SIM_ASN\Request\UnitKerja\Detail::class,
        'getHierarki' => \SIM_ASN\Request\UnitKerja\Hierarki::class,
        'getKartuIdentitas' => \SIM_ASN\Request\UnitKerja\KartuIdentitas::class,
        'getKontak' => \SIM_ASN\Request\UnitKerja\Kontak::class,
        'getAlamat' => \SIM_ASN\Request\UnitKerja\Alamat::class,
        'getKeluarga' => \SIM_ASN\Request\UnitKerja\Keluarga::class,
        'getPendidikan' => \SIM_ASN\Request\UnitKerja\Pendidikan::class,
    ];
}
