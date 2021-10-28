<?php

namespace SIM_ASN;

use Closure;
use GuzzleHttp\Psr7\Response;
use SIM_ASN\Request\Base as BaseRequest;

class UserClient extends Client
{
    /**
     * on refresh token handler.
     *
     * @var Clouser
     */
    protected $onRefreshTokenHandler;

    /**
     * requests.
     *
     * @var array
     */
    protected $requests = [
        'getUser' => \SIM_ASN\Request\Profile\User::class,
        'getPegawai' => \SIM_ASN\Request\Profile\Pegawai::class,
        'getHierarki' => \SIM_ASN\Request\Profile\Hierarki::class,
        'getKartuIdentitas' => \SIM_ASN\Request\Profile\KartuIdentitas::class,
        'getKontak' => \SIM_ASN\Request\Profile\Kontak::class,
        'getAlamat' => \SIM_ASN\Request\Profile\Alamat::class,
        'getKeluarga' => \SIM_ASN\Request\Profile\Keluarga::class,
        'getRiwayatKeluarga' => \SIM_ASN\Request\Profile\RiwayatKeluarga::class,
        'getRiwayatGolongan' => \SIM_ASN\Request\Profile\RiwayatGolongan::class,
        'getRiwayatJabatan' => \SIM_ASN\Request\Profile\RiwayatJabatan::class,
        'getRiwayatPendidikan' => \SIM_ASN\Request\Profile\RiwayatPendidikan::class,
        'getRiwayatDiklat' => \SIM_ASN\Request\Profile\RiwayatDiklat::class,
        'getRiwayatPelanggaran' => \SIM_ASN\Request\Profile\RiwayatPelanggaran::class,
        'getDokumen' => \SIM_ASN\Request\Profile\Dokumen::class,
        'getFile' => \SIM_ASN\Request\Profile\File::class,
    ];

    /**
     * on refresh token.
     */
    public function onRefreshToken(Closure $onSave): void
    {
        $this->onRefreshTokenHandler = $onSave;
    }

    /**
     * handle client exception.
     */
    protected function handleException(int $status, $data, BaseRequest $request, Response $response)
    {
        if (401 === $status && $this->refreshableToken()) {
            try {
                $freshToken = $this->accessToken->refresh();
                $onSave = $this->onRefreshTokenHandler;
                $onSave($freshToken);

                if (!is_null($this->currentProcess)) {
                    return $this->retryProcess($freshToken);
                }
            } catch (\Exception $error) {
                return parent::handleException($status, $data, $request, $response);
            }
        }

        return parent::handleException($status, $data, $request, $response);
    }

    /**
     * determine is token refreshable.
     */
    protected function refreshableToken(): bool
    {
        return isset($this->accessToken) && isset($this->onRefreshTokenHandler);
    }
}
