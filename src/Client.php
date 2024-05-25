<?php

namespace SIM_ASN;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use SIM_ASN\Laravel\ServiceProvider;
use SIM_ASN\Models\AccessToken;
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
     * is retrying process flag.
     *
     * @var bool
     */
    protected $retrying = false;

    /**
     * constructor.
     *
     * @return void
     */
    public function __construct(?AccessToken $accessToken = null, array $config = [])
    {
        $this->accessToken = $accessToken;

        $config['verify'] = 'production' === env('APP_ENV');

        if (!isset($config['base_uri'])) {
            $config['base_uri'] = config(ServiceProvider::CONFIG_KEY.'.url');
        }

        parent::__construct($config);
    }

    /**
     * set access token.
     */
    public function setAccessToken(AccessToken $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * get access token.
     */
    public function getAccessToken(): ?AccessToken
    {
        return $this->accessToken;
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
        $this->retrying = true;

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
        if (!array_key_exists($method, $this->requests)) {
            return parent::__call($method, $args);
        }

        $this->currentProcess = [
            'method' => $method,
            'args' => $args,
        ];

        $method = $this->requests[$method];

        $request = new $method(
            $this->accessToken,
            ...$args
        );

        return $this->process($request);
    }
}
