<?php

namespace SIM_ASN\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use SIM_ASN\UserClient as Concret;

/**
 * @method static \SIM_ASN\Resource\User getUser()
 * @method static \SIM_ASN\Resource\Pegawai getPegawai()
 * @method static mixed getHierarki()
 * @method static mixed getKartuIdentitas()
 * @method static mixed getKontak()
 * @method static mixed getAlamat()
 * @method static mixed getKeluarga()
 * @method static mixed getRiwayatKeluarga()
 * @method static mixed getRiwayatGolongan()
 * @method static mixed getRiwayatJabatan()
 * @method static mixed getRiwayatPendidikan()
 * @method static mixed getRiwayatDiklat()
 * @method static mixed getRiwayatPelanggaran()
 * @method static mixed getDokumen()
 * @method static mixed getFile()
 * @method static self setAccessToken(\SIM_ASN\Resource\AccessToken $accessToken)
 * @method static void onRefreshToken(\Closure $onSave)
 */
class UserClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Concret::class;
    }
}
