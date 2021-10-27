<?php

namespace SIM_ASN\Laravel\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SIM_ASN\Laravel\Facades\AppClient;

class UnitKerjaController extends Controller
{
    /**
     * module
     *
     * @var \SIM_ASN\Modules\UnitKerja
     */
    protected $module;

    /**
     * constructor.
     */
    public function __construct(AppClient $manager)
    {
        $this->module = $manager::unitKerja();
    }

    /**
     * get detail.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getDetail(Request $request, $id, $unitId)
    {
        try {
            $data = $this->module->getDetail($id, $unitId);
            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get hierarki.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getHierarki(Request $request, $id, $unitId)
    {
        try {
            $data = $this->module->getHierarki($id, $unitId);
            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get kartu identitas.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getKartuIdentitas(Request $request, $id, $unitId)
    {
        try {
            $data = $this->module->getKartuIdentitas($id, $unitId);
            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get kontak.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getKontak(Request $request, $id, $unitId)
    {
        try {
            $data = $this->module->getKontak($id, $unitId);
            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get alamat.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getAlamat(Request $request, $id, $unitId)
    {
        try {
            $data = $this->module->getAlamat($id, $unitId);
            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get keluarga.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getKeluarga(Request $request, $id, $unitId)
    {
        try {
            $data = $this->module->getKeluarga($id, $unitId);
            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get pendidikan.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getPendidikan(Request $request, $id, $unitId)
    {
        try {
            $data = $this->module->getPendidikan($id, $unitId);
            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }
}
