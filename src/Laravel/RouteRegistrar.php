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
    }

    /**
     * Register the routes for module pegawai.
     *
     * @return void
     */
    public function modulePegawai()
    {
        $this->router->get('/pegawai', ['uses' => 'PegawaiController@getList', 'as' => 'sim-asn.pegawai.list']);
        $this->router->get('/pegawai/{id}', ['uses' => 'PegawaiController@getDetail', 'as' => 'sim-asn.pegawai.detail']);
        $this->router->get('/pegawai/{id}/hierarki', ['uses' => 'PegawaiController@getHierarki', 'as' => 'sim-asn.pegawai.hierarki']);
        $this->router->get('/pegawai/{id}/kartu_identitas', ['uses' => 'PegawaiController@getKartuIdentitas', 'as' => 'sim-asn.pegawai.kartu_identitas']);
        $this->router->get('/pegawai/{id}/kontak', ['uses' => 'PegawaiController@getKontak', 'as' => 'sim-asn.pegawai.kontak']);
        $this->router->get('/pegawai/{id}/alamat', ['uses' => 'PegawaiController@getAlamat', 'as' => 'sim-asn.pegawai.alamat']);
        $this->router->get('/pegawai/{id}/keluarga', ['uses' => 'PegawaiController@getKeluarga', 'as' => 'sim-asn.pegawai.keluarga']);
        $this->router->get('/pegawai/{id}/riwayat_keluarga', ['uses' => 'PegawaiController@getRiwayatKeluarga', 'as' => 'sim-asn.pegawai.riwayat_keluarga']);
        $this->router->get('/pegawai/{id}/riwayat_golongan', ['uses' => 'PegawaiController@getRiwayatGolongan', 'as' => 'sim-asn.pegawai.riwayat_golongan']);
        $this->router->get('/pegawai/{id}/riwayat_jabatan', ['uses' => 'PegawaiController@getRiwayatJabatan', 'as' => 'sim-asn.pegawai.riwayat_jabatan']);
        $this->router->get('/pegawai/{id}/riwayat_pendidikan', ['uses' => 'PegawaiController@getRiwayatPendidikan', 'as' => 'sim-asn.pegawai.riwayat_pendidikan']);
        $this->router->get('/pegawai/{id}/riwayat_diklat', ['uses' => 'PegawaiController@getRiwayatDiklat', 'as' => 'sim-asn.pegawai.riwayat_diklat']);
        $this->router->get('/pegawai/{id}/riwayat_pelanggaran', ['uses' => 'PegawaiController@getRiwayatPelanggaran', 'as' => 'sim-asn.pegawai.riwayat_pelanggaran']);
        $this->router->get('/pegawai/{id}/dokumen', ['uses' => 'PegawaiController@getDokumen', 'as' => 'sim-asn.pegawai.dokumen']);
        $this->router->get('/pegawai/{id}/file', ['uses' => 'PegawaiController@getFile', 'as' => 'sim-asn.pegawai.file']);
    }

    /**
     * Register the routes for module pegawai.
     *
     * @return void
     */
    public function moduleUser()
    {
        $this->router->get('/user', ['uses' => 'UserController@getList', 'as' => 'sim-asn.user.list']);
        $this->router->get('/user/{id}', ['uses' => 'UserController@getDetail', 'as' => 'sim-asn.user.detail']);
    }
}
