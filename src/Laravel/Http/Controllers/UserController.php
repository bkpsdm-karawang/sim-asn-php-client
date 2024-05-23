<?php

namespace SIM_ASN\Laravel\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SIM_ASN\Laravel\Facades\AppClient;

class UserController extends Controller
{
    /**
     * module.
     *
     * @var \SIM_ASN\Modules\User
     */
    protected $module;

    /**
     * constructor.
     */
    public function __construct(AppClient $manager)
    {
        $this->module = $manager::user();
    }

    /**
     * get list.
     *
     * @return JsonResponse
     */
    public function getList(Request $request)
    {
        try {
            $data = $this->module->getList($request->query());

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get detail.
     *
     * @return JsonResponse
     */
    public function getDetail(Request $request, $id)
    {
        try {
            $data = $this->module->getDetail($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }
}
