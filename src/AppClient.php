<?php

namespace SIM_ASN;

use SIM_ASN\Laravel\Facades\OauthClient;
use SIM_ASN\Resource\AccessToken;
use SIM_ASN\Modules\Pegawai as PegawaiModule;
use SIM_ASN\Modules\Skpd as SkpdModule;
use SIM_ASN\Modules\User as UserModule;
use SIM_ASN\Modules\UnitKerja as UnitKerjaModule;

class AppClient extends Client
{
    /**
     * constructor.
     *
     * @param ClientInterface $client
     *
     * @return void
     */
    public function __construct(AccessToken $accessToken = null, array $localConfig = [])
    {
        $this->configureLocal($localConfig);

        $accessToken = $this->generateAccessToken();

        parent::__construct($accessToken, $localConfig);
    }

    /**
     * generate app access token.
     */
    protected function generateAccessToken(): ?AccessToken
    {
        $accessToken = $this->getLocalToken();

        if ($accessToken) {
            return $accessToken;
        }

        $accessToken = OauthClient::requestAppToken();
        $path = $this->localConfig['app_token_path'];

        $this->saveAccessToken($path, $accessToken);

        return $accessToken;
    }

    /**
     * save acess token
     */
    protected function saveAccessToken($path, AccessToken $accessToken, bool $storage = false): void
    {
        try {
            if ($storage && function_exists('storage_path')) {
                $path = storage_path($path);
            }

            file_put_contents($path, json_encode($accessToken->toArray()));
        } catch (\Exception $error) {
            if (!$storage) {
                $this->saveAccessToken($path, $accessToken, true);
            } else {
                throw $error;
            }
        }
    }

    /**
     * get local token.
     */
    protected function getLocalToken(bool $storage = false): ?AccessToken
    {
        $path = $this->localConfig['app_token_path'];

        if ($storage && function_exists('storage_path')) {
            $path = storage_path($path);
        }

        if (file_exists($path)) {
            $data = file_get_contents($path);

            return new AccessToken(json_decode($data, true));
        }

        if (!$storage) {
            return $this->getLocalToken(true);
        }

        return null;
    }

    /**
     * create module.
     */
    public function module(string $module)
    {
        return (new ModuleManager($this))->module($module);
    }

    /**
     * create module user.
     */
    public function user(): UserModule
    {
        return (new ModuleManager($this))->createUserDriver();
    }

    /**
     * create module pegawai.
     */
    public function pegawai(): PegawaiModule
    {
        return (new ModuleManager($this))->createPegawaiDriver();
    }

    /**
     * create module skpd.
     */
    public function skpd(): SkpdModule
    {
        return (new ModuleManager($this))->createSkpdDriver();
    }

    /**
     * create module skpd.
     */
     public function unitKerja(): UnitKerjaModule
    {
        return (new ModuleManager($this))->createUnitKerjaDriver();
    }
}
