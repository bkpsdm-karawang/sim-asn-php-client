<?php

namespace SIM_ASN\Laravel\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * client.
     *
     * @var \SIM_ASN\Request\Module
     */
    protected $client;

    /**
     * get list.
     *
     * @return JsonResponse
     */
    public function getList(Request $request)
    {
        try {
            $data = $this->client->getList($request->query());
            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get detail.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getDetail(Request $request, $id)
    {
        try {
            $data = $this->client->getDetail($id);
            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * handle exception from sim-asn
     */
    protected function handleClientException(ClientException $exception)
    {
        $response = $exception->getResponse();

        return new JsonResponse(
            ['message' => $exception->getMessage()],
            $response->getStatusCode()
        );
    }
}
