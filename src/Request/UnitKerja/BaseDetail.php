<?php

namespace SIM_ASN\Request\UnitKerja;

use SIM_ASN\Models\AccessToken;
use SIM_ASN\Request\Base;

abstract class BaseDetail extends Base
{
    /**
     * id key.
     */
    protected $idSkpdKey = '{id}';

    /**
     * id key.
     */
    protected $idKey = '{unitId}';

    /**
     * constructor.
     */
    public function __construct(?AccessToken $accessToken = null, $idSKpd, $id)
    {
        $this->endpoint = str_replace($this->idSkpdKey, $idSKpd, $this->endpoint);
        $this->endpoint = str_replace($this->idKey, $id, $this->endpoint);

        parent::__construct($accessToken);
    }

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return $this->createModel($data['data']);
    }
}
