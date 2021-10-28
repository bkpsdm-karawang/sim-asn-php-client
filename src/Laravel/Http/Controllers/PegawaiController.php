<?php

namespace SIM_ASN\Laravel\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SIM_ASN\Laravel\Facades\AppClient;

class PegawaiController extends Controller
{
    /**
     * module.
     *
     * @var \SIM_ASN\Modules\Pegawai
     */
    protected $module;

    /**
     * constructor.
     */
    public function __construct(AppClient $manager)
    {
        $this->module = $manager::pegawai();
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
     * @param mixed $id
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
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getHierarki(Request $request, $id)
    {
        try {
            $data = $this->module->getHierarki($id);

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
     * @param mixed $id
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
     * @param mixed $id
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
     * @param mixed $id
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
     * get riwayat keluarga.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getRiwayatKeluarga(Request $request, $id)
    {
        try {
            $data = $this->module->getRiwayatKeluarga($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get riwayat golongan.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getRiwayatGolongan(Request $request, $id)
    {
        try {
            $data = $this->module->getRiwayatGolongan($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get riwayat jabatan.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getRiwayatJabatan(Request $request, $id)
    {
        try {
            $data = $this->module->getRiwayatJabatan($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get riwayat pendidikan.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getRiwayatPendidikan(Request $request, $id)
    {
        try {
            $data = $this->module->getRiwayatPendidikan($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get riwayat diklat.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getRiwayatDiklat(Request $request, $id)
    {
        try {
            $data = $this->module->getRiwayatDiklat($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get riwayat pelanggaran.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getRiwayatPelanggaran(Request $request, $id)
    {
        try {
            $data = $this->module->getRiwayatPelanggaran($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get dokumen.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getDokumen(Request $request, $id)
    {
        try {
            $data = $this->module->getDokumen($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }

    /**
     * get file.
     *
     * @param mixed $id
     *
     * @return JsonResponse
     */
    public function getFile(Request $request, $id)
    {
        try {
            $data = $this->module->getFile($id);

            return new JsonResponse($data);
        } catch (ClientException $error) {
            return $this->handleClientException($error);
        }
    }
}
