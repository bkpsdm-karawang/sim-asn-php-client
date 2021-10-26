<?php

namespace SIM_ASN\Request;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Utils;
use SIM_ASN\Resource\AccessToken;

abstract class Base extends Request
{
    /**
     * sim-asn configuration
     *
     * @var array
     */
    protected $config = [];

    /**
     * Access token
     *
     * @var AccessToken
     */
    protected $accessToken;

    /**
     * method of request
     *
     * @var string
     */
    protected $method = 'GET';

    /**
     * endpoint for request
     *
     * @var string
     */
    protected $endpoint = '/';

    /**
     * constructor
     */
    public function __construct(AccessToken $accessToken = null, $body = null)
    {
        $this->accessToken = $accessToken;
        $this->config = config('sim_asn');

        parent::__construct(
            $this->method,
            $this->endpoint,
            $this->generateRequestHeader(),
            $this->generateRequestBody($body)
        );
    }

    /**
    * generate request header
    */
    protected function generateRequestHeader(): array
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];

        if ($this->accessToken) {
            $headers['Authorization'] = "Bearer {$this->accessToken->getAccessToken()}";
        }

        return $headers;
    }

    /**
    * generate request body
    */
    protected function generateRequestBody($body = null): string
    {
        return Utils::jsonEncode($body);
    }

    /**
     * map data from sim-asn
     */
    public function mapData(array $data)
    {
        return $data;
    }
}
