<?php

namespace SIM_ASN;

use Illuminate\Support\Manager as BaseManager;
use InvalidArgumentException;
use SIM_ASN\AppClient;
use SIM_ASN\Modules\Pegawai;
use SIM_ASN\Modules\Skpd;
use SIM_ASN\Modules\UnitKerja;
use SIM_ASN\Modules\User;

class ModuleManager extends BaseManager
{
    /**
     * app client
     *
     * @var \SIM_ASN\AppClient
     */
    protected $client;

    public function __construct(AppClient $client)
    {
        $this->client = $client;
    }

    /**
     * create module
     */
    public function module($name)
    {
        return $this->driver($name);
    }

    /**
     * create user driver
     */
    public function createUserDriver(): User
    {
        return new User($this->client->getAccessToken(), $this->client->localConfig);
    }

    /**
     * create pegawai driver
     */
    public function createPegawaiDriver(): Pegawai
    {
        return new Pegawai($this->client->getAccessToken(), $this->client->localConfig);
    }

    /**
     * create skpd driver
     */
    public function createSkpdDriver(): Skpd
    {
        return new Skpd($this->client->getAccessToken(), $this->client->localConfig);
    }

    /**
     * create unit kerja driver
     */
    public function createUnitKerjaDriver(): UnitKerja
    {
        return new UnitKerja($this->client->getAccessToken(), $this->client->localConfig);
    }

    /**
     * Get the default driver name.
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getDefaultDriver()
    {
        throw new InvalidArgumentException('No simpeg client driver was specified.');
    }
}
