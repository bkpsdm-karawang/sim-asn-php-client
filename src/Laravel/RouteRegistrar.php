<?php

namespace SIM_ASN\Laravel;

class RouteRegistrar
{
    /**
     * The router implementation.
     *
     * @var \Illuminate\Contracts\Routing\Registrar
     */
    protected $router;

    /**
     * Create a new route registrar instance.
     *
     * @param \Illuminate\Contracts\Routing\Registrar $router
     *
     * @return void
     */
    public function __construct($router)
    {
        $this->router = $router;
    }

    /**
     * Register routes for transient tokens, clients, and personal access tokens.
     *
     * @return void
     */
    public function all()
    {
        $this->modulePegawai();
        $this->moduleUser();
        $this->moduleSkpd();
        $this->moduleSotk();
    }

    /**
     * Register the routes for module pegawai.
     *
     * @return void
     */
    public function modulePegawai()
    {
        $this->router->get('/pegawai', ['uses' => 'PegawaiController@getList', 'as' => 'sim-asn.pegawai.list']);
        $this->router->group(['prefix' => '/pegawai/{id}'], function ($router) {
            $router->get('/', ['uses' => 'PegawaiController@getDetail', 'as' => 'sim-asn.pegawai.detail']);
            $router->get('/hierarki', ['uses' => 'PegawaiController@getHierarki', 'as' => 'sim-asn.pegawai.hierarki']);
            $router->get('/kartu_identitas', ['uses' => 'PegawaiController@getKartuIdentitas', 'as' => 'sim-asn.pegawai.kartu_identitas']);
            $router->get('/kontak', ['uses' => 'PegawaiController@getKontak', 'as' => 'sim-asn.pegawai.kontak']);
            $router->get('/alamat', ['uses' => 'PegawaiController@getAlamat', 'as' => 'sim-asn.pegawai.alamat']);
            $router->get('/keluarga', ['uses' => 'PegawaiController@getKeluarga', 'as' => 'sim-asn.pegawai.keluarga']);
            $router->get('/riwayat_keluarga', ['uses' => 'PegawaiController@getRiwayatKeluarga', 'as' => 'sim-asn.pegawai.riwayat_keluarga']);
            $router->get('/riwayat_golongan', ['uses' => 'PegawaiController@getRiwayatGolongan', 'as' => 'sim-asn.pegawai.riwayat_golongan']);
            $router->get('/riwayat_jabatan', ['uses' => 'PegawaiController@getRiwayatJabatan', 'as' => 'sim-asn.pegawai.riwayat_jabatan']);
            $router->get('/riwayat_pendidikan', ['uses' => 'PegawaiController@getRiwayatPendidikan', 'as' => 'sim-asn.pegawai.riwayat_pendidikan']);
            $router->get('/riwayat_diklat', ['uses' => 'PegawaiController@getRiwayatDiklat', 'as' => 'sim-asn.pegawai.riwayat_diklat']);
            $router->get('/riwayat_pelanggaran', ['uses' => 'PegawaiController@getRiwayatPelanggaran', 'as' => 'sim-asn.pegawai.riwayat_pelanggaran']);
            $router->get('/dokumen', ['uses' => 'PegawaiController@getDokumen', 'as' => 'sim-asn.pegawai.dokumen']);
            $router->get('/file', ['uses' => 'PegawaiController@getFile', 'as' => 'sim-asn.pegawai.file']);
        });
    }

    /**
     * Register the routes for module user.
     *
     * @return void
     */
    public function moduleUser()
    {
        $this->router->get('/user', ['uses' => 'UserController@getList', 'as' => 'sim-asn.user.list']);
        $this->router->get('/user/{id}', ['uses' => 'UserController@getDetail', 'as' => 'sim-asn.user.detail']);
    }

    /**
     * Register the routes for module skpd.
     *
     * @return void
     */
    public function moduleSkpd()
    {
        $this->router->group(['prefix' => '/skpd/{id}'], function ($router) {
            $router->get('/', ['uses' => 'SkpdController@getDetail', 'as' => 'sim-asn.skpd.detail']);
            $router->get('/hierarki', ['uses' => 'SkpdController@getHierarki', 'as' => 'sim-asn.skpd.hierarki']);
            $router->get('/kartu_identitas', ['uses' => 'SkpdController@getKartuIdentitas', 'as' => 'sim-asn.skpd.kartu_identitas']);
            $router->get('/kontak', ['uses' => 'SkpdController@getKontak', 'as' => 'sim-asn.skpd.kontak']);
            $router->get('/alamat', ['uses' => 'SkpdController@getAlamat', 'as' => 'sim-asn.skpd.alamat']);
            $router->get('/keluarga', ['uses' => 'SkpdController@getKeluarga', 'as' => 'sim-asn.skpd.keluarga']);
            $router->get('/pendidikan', ['uses' => 'SkpdController@getPendidikan', 'as' => 'sim-asn.skpd.pendidikan']);
            $router->group(['prefix' => '/unit_kerja/{unitId}'], function ($router) {
                $router->get('/', ['uses' => 'UnitKerjaController@getDetail', 'as' => 'sim-asn.unit_kerja.detail']);
                $router->get('/hierarki', ['uses' => 'UnitKerjaController@getHierarki', 'as' => 'sim-asn.unit_kerja.hierarki']);
                $router->get('/kartu_identitas', ['uses' => 'UnitKerjaController@getKartuIdentitas', 'as' => 'sim-asn.unit_kerja.kartu_identitas']);
                $router->get('/kontak', ['uses' => 'UnitKerjaController@getKontak', 'as' => 'sim-asn.unit_kerja.kontak']);
                $router->get('/alamat', ['uses' => 'UnitKerjaController@getAlamat', 'as' => 'sim-asn.unit_kerja.alamat']);
                $router->get('/keluarga', ['uses' => 'UnitKerjaController@getKeluarga', 'as' => 'sim-asn.unit_kerja.keluarga']);
                $router->get('/pendidikan', ['uses' => 'UnitKerjaController@getPendidikan', 'as' => 'sim-asn.unit_kerja.pendidikan']);
            });
        });
    }

    /**
     * Register the routes for module sotk.
     *
     * @return void
     */
    public function moduleSotk()
    {
        $this->router->get('/sotk/{url}', ['uses' => 'SotkController@get', 'as' => 'sim-asn.sotk'])->where('url', '.*');
    }
}
