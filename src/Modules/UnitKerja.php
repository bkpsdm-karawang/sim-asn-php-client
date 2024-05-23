<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;

/**
 * @method \SIM_ASN\Models\UnitKerja                   getDetail($idSkpd, $id)
 * @method \Illuminate\Support\Collection              getHierarki($idSkpd, $id)
 * @method \Illuminate\Pagination\LengthAwarePaginator getKartuIdentitas($idSkpd, $id)
 * @method \Illuminate\Pagination\LengthAwarePaginator getKontak($idSkpd, $id)
 * @method \Illuminate\Pagination\LengthAwarePaginator getAlamat($idSkpd, $id)
 * @method \Illuminate\Pagination\LengthAwarePaginator getKeluarga($idSkpd, $id)
 * @method \Illuminate\Pagination\LengthAwarePaginator getPendidikan($idSkpd, $id)
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
