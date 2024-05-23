<?php

namespace SIM_ASN\Request\UnitKerja;

use SIM_ASN\Models\AccessToken;
use SIM_ASN\Request\BaseListing as Base;

abstract class BaseListing extends Base
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
    public function __construct(?AccessToken $accessToken = null, $idSKpd, $id, array $query = [])
    {
        $this->endpoint = str_replace($this->idSkpdKey, $idSKpd, $this->endpoint);
        $this->endpoint = str_replace($this->idKey, $id, $this->endpoint);

        parent::__construct($accessToken, $query);
    }
}
