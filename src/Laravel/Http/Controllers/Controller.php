<?php

namespace SIM_ASN\Laravel\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * handle exception from sim-asn.
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
