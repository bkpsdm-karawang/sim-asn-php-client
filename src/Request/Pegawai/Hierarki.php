<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Hierarki as Model;
use SIM_ASN\Request\BaseDetail;

class Hierarki extends BaseDetail
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
    protected $endpoint = '/api/pegawai/{id}/hierarki';

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return $this->createModel($data);
    }
}
