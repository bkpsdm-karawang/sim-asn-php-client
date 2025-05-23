<?php

namespace SIM_ASN\Laravel\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SIM_ASN\Laravel\Facades\AppClient;

class SotkController extends Controller
{
    /**
     * module.
     *
     * @var \SIM_ASN\Modules\Sotk
     */
    protected $module;

    /**
     * constructor.
     */
    public function __construct(AppClient $manager)
    {
        $this->module = $manager::sotk(false);
    }

    /**
     * get data.
     *
     * @return JsonResponse
     */
    public function get(Request $request, $url)
    {
        try {
            $data = $this->module->getRequest($url, $request->query());

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }
}
