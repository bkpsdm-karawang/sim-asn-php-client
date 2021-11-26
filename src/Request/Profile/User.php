<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\User as Model;
use SIM_ASN\Request\Base;

class User extends Base
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
    protected $endpoint = '/api/me';

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return $this->createModel($data['data']);
    }
}
