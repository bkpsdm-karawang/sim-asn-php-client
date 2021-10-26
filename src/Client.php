<?php

namespace SIM_ASN;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use SIM_ASN\Resource\AccessToken;
use SIM_ASN\Request\Base as BaseRequest;

abstract class Client extends Guzzle
{
    /**
     * client configruation.
     *
     * @var AccessToken
     */
    protected $accessToken;

    /**
     * requests
     *
     * @var array
     */
    protected $requests = [];

    /**
     * constructor.
     *
     * @param ClientInterface $client
     *
     * @return void
     */
    public function __construct(AccessToken $accessToken = null)
    {
        $this->accessToken = $accessToken;

        $config = [
            'verify' => false,
            'base_uri' => $this->config('url')
        ];

        parent::__construct($config);
    }

    /**
     * set access token
     */
    public function setAccessToken(AccessToken $accessToken): self
    {
        $this->accessToken = $accessToken;

        return new static($accessToken);
    }

    /**
     * Helper to get the config values.
     *
     * @param  string  $key
     * @param  string  $default
     *
     * @return mixed
     */
    protected function config($key = null, $default = null)
    {
        if ($key) {
            return config("sim_asn.$key", $default);
        }

        return config('sim_asn');
    }

    /**
     * process request
     */
    protected function process(BaseRequest $request)
    {
        $response = $this->getResponse($request);

        list($status, $data) = $this->readResponse($response);

        if ($status === 200) {
            return $request->mapData($data);
        }

        $mesage = $data['hint'] ?? ($data['message'] ?? 'Oauth error occured');

        throw new ClientException($mesage, $request, $response);
    }

    /**
     * send request to get response
     */
    public function getResponse(RequestInterface $request): Response
    {
        try {
            return $this->send($request);
        } catch (ClientException $err) {
            return $err->getResponse();
        }
    }

    /**
    * get response data
    */
   public function readResponse(Response $response, bool $decode = true): array
   {
       $body = $response->getBody();
       $content = $body->getContents();

       if ($decode) {
           $content = json_decode($content, true);
       }

       return [$response->getStatusCode(), $content];
   }

    /**
     * @param string $method
     * @param array  $args
     */
    public function __call($method, $args)
    {
        if (array_key_exists($method, $this->requests)) {
            $method = $this->requests[$method];
            $request = new $method($this->accessToken, count($args) > 0 ? $args[0]: null);
            return $this->process($request);
        }

        throw new InvalidArgumentException("Method ${$method} undefined");
    }
}
