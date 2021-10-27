<?php

namespace SIM_ASN;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use SIM_ASN\Request\Base as BaseRequest;
use SIM_ASN\Request\Module;
use SIM_ASN\Resource\AccessToken;

abstract class Client extends Guzzle
{
    use ConfigTrait;

    /**
     * client configruation.
     *
     * @var AccessToken
     */
    protected $accessToken;

    /**
     * requests.
     *
     * @var array
     */
    protected $requests = [];

    /**
     * modules.
     *
     * @var array
     */
    protected $modules = [];

    /**
     * current process for retry.
     *
     * @var array
     */
    protected $currentProcess;

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

        $this->accessToken = $accessToken;

        $config = [
            'verify' => false,
            'base_uri' => $this->localConfig['url'],
        ];

        parent::__construct($config);
    }

    /**
     * set access token.
     */
    public function setAccessToken(AccessToken $accessToken): self
    {
        $this->accessToken = $accessToken;

        return new static($accessToken);
    }

    /**
     * get access token.
     */
    public function getAccessToken(): AccessToken
    {
        if ($this->accessToken) {
            return $this->accessToken;
        }

        throw new \Exception('Access token not found');
    }

    /**
     * create module.
     */
    public function module(string $module): Module
    {
        return new Module($this, $module);
    }

    /**
     * process request.
     */
    public function process(BaseRequest $request)
    {
        $response = $this->getResponse($request);

        list($status, $data) = $this->readResponse($response);

        if (200 === $status) {
            return $request->mapData($data);
        }

        return $this->handleException($status, $data, $request, $response);
    }

    /**
     * retry failed process.
     */
    protected function retryProcess(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;

        return $this->__call(
            $this->currentProcess['method'],
            $this->currentProcess['args']
        );
    }

    /**
     * handle client exception.
     */
    protected function handleException(int $status, $data, BaseRequest $request, Response $response)
    {
        $mesage = $data['hint'] ?? ($data['message'] ?? 'Oauth error occured');

        throw new ClientException($mesage, $request, $response);
    }

    /**
     * send request to get response.
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
     * get response data.
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
            $this->currentProcess = [
                'method' => $method,
                'args' => $args,
            ];

            $method = $this->requests[$method];

            $request = new $method(
                $this->localConfig,
                $this->accessToken,
                count($args) > 0 ? $args[0] : null
            );

            return $this->process($request);
        }

        throw new InvalidArgumentException("Method ${$method} undefined");
    }
}
