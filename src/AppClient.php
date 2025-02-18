<?php

namespace SIM_ASN;

use GuzzleHttp\Psr7\Response;
use SIM_ASN\Laravel\Facades\OauthClient;
use SIM_ASN\Laravel\ServiceProvider;
use SIM_ASN\Models\AccessToken;
use SIM_ASN\Modules\Pegawai as PegawaiModule;
use SIM_ASN\Modules\Skpd as SkpdModule;
use SIM_ASN\Modules\Sotk as SotkModule;
use SIM_ASN\Modules\UnitKerja as UnitKerjaModule;
use SIM_ASN\Modules\User as UserModule;
use SIM_ASN\Request\Base as BaseRequest;

class AppClient extends Client
{
    /**
     * constructor.
     *
     * @return void
     */
    public function __construct(?AccessToken $accessToken = null, bool $castField = true)
    {
        if (!$accessToken) {
            $accessToken = $this->generateAccessToken();
        }

        parent::__construct($accessToken, [], $castField);
    }

    /**
     * generate app access token.
     */
    protected function generateAccessToken(bool $force = false): ?AccessToken
    {
        if (!$force) {
            $accessToken = $this->getLocalToken();

            if ($accessToken) {
                return $accessToken;
            }
        }

        $accessToken = OauthClient::requestAppToken();
        $path = ServiceProvider::config('app_token_path');

        $this->saveAccessToken($path, $accessToken);

        return $accessToken;
    }

    /**
     * save acess token.
     */
    protected function saveAccessToken($path, AccessToken $accessToken): void
    {
        if (function_exists('storage_path')) {
            $path = storage_path($path);
        }

        file_put_contents($path, json_encode($accessToken->toArray()));
    }

    /**
     * get local token.
     */
    protected function getLocalToken(): ?AccessToken
    {
        $path = ServiceProvider::config('app_token_path');

        if (function_exists('storage_path')) {
            $path = storage_path($path);
        }

        if (file_exists($path)) {
            $data = file_get_contents($path);
            $decoded = json_decode($data, null);
            if (is_array($decoded) && $this->isValidToken($decoded)) {
                return new AccessToken($decoded);
            }
        }

        return null;
    }

    /**
     * check is token valid.
     */
    protected function isValidToken(array $accessToken)
    {
        return array_key_exists('token_type', $accessToken)
            && array_key_exists('expires_in', $accessToken)
            && array_key_exists('access_token', $accessToken);
    }

    /**
     * handle client exception.
     */
    protected function handleException(int $status, $data, BaseRequest $request, Response $response)
    {
        if (!$this->retrying && 401 === $status) {
            try {
                $freshToken = $this->generateAccessToken(true);

                if (!is_null($this->currentProcess)) {
                    return $this->retryProcess($freshToken->access_token);
                }
            } catch (\Exception $error) {
                return parent::handleException($status, $data, $request, $response);
            }
        }

        return parent::handleException($status, $data, $request, $response);
    }

    /**
     * create module.
     */
    public function module(string $module, bool $castField = true)
    {
        return (new ModuleManager($this, $castField))->module($module);
    }

    /**
     * create module user.
     */
    public function user(bool $castField = true): UserModule
    {
        return (new ModuleManager($this, $castField))->createUserDriver();
    }

    /**
     * create module pegawai.
     */
    public function pegawai(bool $castField = true): PegawaiModule
    {
        return (new ModuleManager($this, $castField))->createPegawaiDriver();
    }

    /**
     * create module skpd.
     */
    public function skpd(bool $castField = true): SkpdModule
    {
        return (new ModuleManager($this, $castField))->createSkpdDriver();
    }

    /**
     * create module skpd.
     */
    public function unitKerja(bool $castField = true): UnitKerjaModule
    {
        return (new ModuleManager($this, $castField))->createUnitKerjaDriver();
    }

    /**
     * create module sotk.
     */
    public function sotk(bool $castField = true): SotkModule
    {
        return (new ModuleManager($this, $castField))->createSotkDriver();
    }
}
