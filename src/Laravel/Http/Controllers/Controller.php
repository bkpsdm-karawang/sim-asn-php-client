<?php

namespace SIM_ASN\Laravel\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;

abstract class Controller
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
