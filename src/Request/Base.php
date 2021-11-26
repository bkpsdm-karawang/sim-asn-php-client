<?php

namespace SIM_ASN\Request;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Utils;
use SIM_ASN\ConfigTrait;
use SIM_ASN\Models\AccessToken;

abstract class Base extends Request
{
    use ConfigTrait;

    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

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
            $uri .= '?'.http_build_query($query);
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
    protected function generateRequestBody($body = null): ?string
    {
        if (!is_null($body)) {
            return Utils::jsonEncode($body);
        }

        return null;
    }

    /**
     * set endpoint.
     */
    public function setEndpoint(array $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return $this->createModel($data);
    }

    /**
     * map object from sim-asn.
     */
    protected function createModel(array $data)
    {
        if ($this->model) {
            return new $this->model($data);
        }

        return $data;
    }
}
