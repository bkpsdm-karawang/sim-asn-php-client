<?php

namespace SIM_ASN\Request;

use InvalidArgumentException;
use SIM_ASN\Client;
use SIM_ASN\ConfigTrait;

class Module
{
    use ConfigTrait;

    /**
     * client for request.
     *
     * @var Client
     */
    protected $client;

    /**
     * available modules.
     *
     * @var array
     */
    protected $modules = [
        'user' => [
            'list' => User\Listing::class,
        ],
    ];
    /**
     * used module.
     *
     * @var array
     */
    protected $name;

    /**
     * constructor.
     */
    public function __construct(Client $client, string $name)
    {
        $this->client = $client;

        $this->configureLocal($client->localConfig);

        if (!array_key_exists($name, $this->modules)) {
            throw new InvalidArgumentException("Module {$name} not exists");
        }

        $this->name = $name;
    }

    /**
     * create request.
     */
    public function createRequest(string $feature)
    {
        $modules = $this->modules[$this->name];

        if (!array_key_exists($feature, $modules)) {
            throw new InvalidArgumentException("Feature {$feature} is not implemented");
        }

        return $modules[$feature];
    }

    /**
     * get list data.
     */
    public function getList(array $query = [])
    {
        $accessToken = $this->client->getAccessToken();
        $request = $this->createRequest('list');
        $instance = new $request($this->localConfig, $accessToken, null, $query);

        return $this->client->process($instance);
    }
}
