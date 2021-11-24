<?php

namespace SIM_ASN\Request\Profile;

use Illuminate\Support\Collection;
use SIM_ASN\Request\Base as BaseRequest;

class Base extends BaseRequest
{
    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return $this->mapObject($data['data']);
    }

    /**
     * map object from sim-asn.
     */
    public function mapObject(array $data)
    {
        return new Collection($data);
    }
}
