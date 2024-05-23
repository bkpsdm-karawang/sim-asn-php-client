<?php

namespace SIM_ASN\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use SIM_ASN\Models\AccessToken;

abstract class BaseListing extends Base
{
    /**
     * constructor.
     */
    public function __construct(?AccessToken $accessToken = null, array $query = [])
    {
        parent::__construct($accessToken, null, $query);
    }

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        if (isset($data['data']) && isset($data['pagination'])) {
            $collection = new Collection(array_map(function ($d) {
                return $this->createModel($d);
            }, $data['data']));

            extract($data['pagination']);

            return new LengthAwarePaginator($collection, $total, $limit, $page);
        }

        if (isset($data['data'])) {
            return new Collection(array_map(function ($d) {
                return $this->createModel($d);
            }, $data['data']));
        }

        return new Collection(array_map(function ($d) {
            return $this->createModel($d);
        }, $data));
    }
}
