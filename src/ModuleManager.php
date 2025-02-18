<?php

namespace SIM_ASN;

use Illuminate\Support\Manager as BaseManager;
use SIM_ASN\Modules\Pegawai;
use SIM_ASN\Modules\Skpd;
use SIM_ASN\Modules\Sotk;
use SIM_ASN\Modules\UnitKerja;
use SIM_ASN\Modules\User;

class ModuleManager extends BaseManager
{
    /**
     * app client.
     *
     * @var AppClient
     */
    protected $client;

    /**
     * cast field.
     *
     * @var bool
     */
    protected $castField = true;

    public function __construct(AppClient $client, bool $castField = true)
    {
        $this->client = $client;
        $this->castField = $castField;
    }

    /**
     * create module.
     */
    public function module($name)
    {
        return $this->driver($name);
    }

    /**
     * create user driver.
     */
    public function createUserDriver(): User
    {
        return new User($this->client->getAccessToken(), [], $this->castField);
    }

    /**
     * create pegawai driver.
     */
    public function createPegawaiDriver(): Pegawai
    {
        return new Pegawai($this->client->getAccessToken(), [], $this->castField);
    }

    /**
     * create skpd driver.
     */
    public function createSkpdDriver(): Skpd
    {
        return new Skpd($this->client->getAccessToken(), [], $this->castField);
    }

    /**
     * create unit kerja driver.
     */
    public function createUnitKerjaDriver(): UnitKerja
    {
        return new UnitKerja($this->client->getAccessToken(), [], $this->castField);
    }

    /**
     * create sotk driver.
     */
    public function createSotkDriver(): Sotk
    {
        return new Sotk($this->client->getAccessToken(), null, $this->castField);
    }

    /**
     * Get the default driver name.
     *
     * @throws \InvalidArgumentException
     */
    public function getDefaultDriver()
    {
        throw new \InvalidArgumentException('No client driver was specified.');
    }
}
