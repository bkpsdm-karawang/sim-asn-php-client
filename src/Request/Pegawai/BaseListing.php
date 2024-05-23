<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\AccessToken;
use SIM_ASN\Request\BaseListing as Base;

abstract class BaseListing extends Base
{
    /**
     * id key.
     */
    protected $idKey = '{id}';

    /**
     * constructor.
     */
    public function __construct(?AccessToken $accessToken = null, $identifier, array $query = [])
    {
        $this->endpoint = str_replace($this->idKey, $identifier, $this->endpoint);

        parent::__construct($accessToken, $query);
    }
}
