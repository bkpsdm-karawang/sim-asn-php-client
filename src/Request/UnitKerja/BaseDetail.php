<?php

namespace SIM_ASN\Request\UnitKerja;

use SIM_ASN\Request\Base;
use SIM_ASN\Resource\AccessToken;

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
    public function __construct(array $localConfig = [], AccessToken $accessToken = null, $idSKpd, $id)
    {
        $this->endpoint = str_replace($this->idSkpdKey, $idSKpd, $this->endpoint);
        $this->endpoint = str_replace($this->idKey, $id, $this->endpoint);

        parent::__construct($localConfig, $accessToken);
    }
}
