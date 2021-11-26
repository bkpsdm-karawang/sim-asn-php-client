<?php

namespace SIM_ASN\Request;

use SIM_ASN\Models\AccessToken;

abstract class BaseDetail extends Base
{
    /**
     * id key.
     */
    protected $idKey = '{id}';

    /**
     * constructor.
     */
    public function __construct(array $localConfig = [], AccessToken $accessToken = null, $identifier, array $query = [])
    {
        $this->endpoint = str_replace($this->idKey, $identifier, $this->endpoint);

        parent::__construct($localConfig, $accessToken, null, $query);
    }

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return $this->createModel($data['data']);
    }
}
