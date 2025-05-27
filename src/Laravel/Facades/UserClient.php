<?php

namespace SIM_ASN\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use SIM_ASN\UserClient as Concret;

/**
 * @method static \SIM_ASN\Models\User                getUser()
 * @method static \SIM_ASN\Models\Pegawai             getPegawai()
 * @method static \SIM_ASN\Models\Hierarki            getHierarki()
 * @method static \Illuminate\Support\Collection      getPhotoProfile()
 * @method static \Illuminate\Support\Collection      getKartuIdentitas()
 * @method static \Illuminate\Support\Collection      getKontak()
 * @method static \Illuminate\Support\Collection      getAlamat()
 * @method static \Illuminate\Support\Collection      getKeluarga()
 * @method static \Illuminate\Support\Collection      getRiwayatKeluarga()
 * @method static \Illuminate\Support\Collection      getRiwayatGolongan()
 * @method static \Illuminate\Support\Collection      getRiwayatJabatan()
 * @method static \Illuminate\Support\Collection      getRiwayatPendidikan()
 * @method static \Illuminate\Support\Collection      getRiwayatDiklat()
 * @method static \Illuminate\Support\Collection      getRiwayatPelanggaran()
 * @method static \Illuminate\Support\Collection      getDokumen()
 * @method static \Illuminate\Support\Collection      getFile()
 * @method static \SIM_ASN\Models\AccessToken         getAccessToken()
 * @method static self                                setAccessToken(\SIM_ASN\Models\AccessToken $accessToken)
 * @method static void                                onRefreshToken(\Closure $onSave)
 * @method static \Psr\Http\Message\ResponseInterface get($uri, array $options = [])
 * @method static \Psr\Http\Message\ResponseInterface head($uri, array $options = [])
 * @method static \Psr\Http\Message\ResponseInterface post($uri, array $options = [])
 * @method static \Psr\Http\Message\ResponseInterface patch($uri, array $options = [])
 * @method static \Psr\Http\Message\ResponseInterface put($uri, array $options = [])
 * @method static \Psr\Http\Message\ResponseInterface delete($uri, array $options = [])
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
