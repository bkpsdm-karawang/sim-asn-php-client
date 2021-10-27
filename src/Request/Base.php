<?php

namespace SIM_ASN\Request;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Utils;
use SIM_ASN\ConfigTrait;
use SIM_ASN\Resource\AccessToken;

abstract class Base extends Request
{
    use ConfigTrait;

    /**
     * Access token.
     *
     * @var AccessToken
     */
    protected $accessToken;

    /**
     * method of request.
     *
     * @var string
     */
    protected $method = 'GET';

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/';

    /**
     * constructor.
     */
    public function __construct(array $localConfig = [], AccessToken $accessToken = null, $body = null, array $query = [])
    {
        $this->configureLocal($localConfig);

        $this->accessToken = $accessToken;

        $uri = $this->endpoint;
        if (count($query) > 0) {
            $uri = http_build_query($query);
        }

        parent::__construct(
            $this->method,
            $uri,
            $this->generateRequestHeader(),
            $this->generateRequestBody($body)
        );
    }

    /**
     * generate request header.
     */
    protected function generateRequestHeader(): array
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        if ($this->accessToken) {
            $headers['Authorization'] = "Bearer {$this->accessToken->access_token}";
        }

        return $headers;
    }

    /**
     * generate request body.
     */
    protected function generateRequestBody($body = null): string
    {
        return Utils::jsonEncode($body);
    }

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return $data;
    }
}
