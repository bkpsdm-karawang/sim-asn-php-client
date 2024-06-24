<?php

namespace SIM_ASN;

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
        'getUser' => Request\Profile\User::class,
        'getPegawai' => Request\Profile\Pegawai::class,
        'getHierarki' => Request\Profile\Hierarki::class,
        'getKartuIdentitas' => Request\Profile\KartuIdentitas::class,
        'getKontak' => Request\Profile\Kontak::class,
        'getAlamat' => Request\Profile\Alamat::class,
        'getKeluarga' => Request\Profile\Keluarga::class,
        'getRiwayatKeluarga' => Request\Profile\RiwayatKeluarga::class,
        'getRiwayatGolongan' => Request\Profile\RiwayatGolongan::class,
        'getRiwayatJabatan' => Request\Profile\RiwayatJabatan::class,
        'getRiwayatPendidikan' => Request\Profile\RiwayatPendidikan::class,
        'getRiwayatDiklat' => Request\Profile\RiwayatDiklat::class,
        'getRiwayatPelanggaran' => Request\Profile\RiwayatPelanggaran::class,
        'getRiwayatSertifikasi' => Request\Profile\RiwayatSertifikasi::class,
        'getRiwayatLhk' => Request\Profile\RiwayatLhk::class,
        'getRiwayatSkp' => Request\Profile\RiwayatSkp::class,
        'getDokumen' => Request\Profile\Dokumen::class,
        'getFile' => Request\Profile\File::class,
        'getCompleteness' => Request\Profile\Completeness::class,
    ];

    /**
     * on refresh token.
     */
    public function onRefreshToken(\Closure $onSave): void
    {
        $this->onRefreshTokenHandler = $onSave;
    }

    /**
     * handle client exception.
     */
    protected function handleException(int $status, $data, BaseRequest $request, Response $response)
    {
        if (!$this->retrying && 401 === $status && $this->refreshableToken()) {
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
