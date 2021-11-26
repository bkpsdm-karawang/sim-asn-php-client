<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Pegawai as Model;
use SIM_ASN\Request\Base;

class Pegawai extends Base
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Model::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me/pegawai';

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return $this->createModel($data['data']);
    }
}
