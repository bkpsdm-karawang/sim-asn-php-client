<?php

namespace SIM_ASN\Laravel\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SIM_ASN\Laravel\Facades\AppClient;

class SkpdController extends Controller
{
    /**
     * module.
     *
     * @var \SIM_ASN\Modules\Skpd
     */
    protected $module;

    /**
     * constructor.
     */
    public function __construct(AppClient $manager)
    {
        $this->module = $manager::skpd(false);
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

    /**
     * get hierarki.
     *
     * @return JsonResponse
     */
    public function getHierarki(Request $request, $id)
    {
        try {
            $data = $this->module->getHierarki($id, $request->all());

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get kartu identitas.
     *
     * @return JsonResponse
     */
    public function getKartuIdentitas(Request $request, $id)
    {
        try {
            $data = $this->module->getKartuIdentitas($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get kontak.
     *
     * @return JsonResponse
     */
    public function getKontak(Request $request, $id)
    {
        try {
            $data = $this->module->getKontak($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get alamat.
     *
     * @return JsonResponse
     */
    public function getAlamat(Request $request, $id)
    {
        try {
            $data = $this->module->getAlamat($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get keluarga.
     *
     * @return JsonResponse
     */
    public function getKeluarga(Request $request, $id)
    {
        try {
            $data = $this->module->getKeluarga($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get pendidikan.
     *
     * @return JsonResponse
     */
    public function getPendidikan(Request $request, $id)
    {
        try {
            $data = $this->module->getPendidikan($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }
}
