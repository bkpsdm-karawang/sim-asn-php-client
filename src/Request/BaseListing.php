<?php

namespace SIM_ASN\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use SIM_ASN\Resource\AccessToken;

abstract class BaseListing extends Base
{
    /**
     * constructor.
     */
    public function __construct(array $localConfig = [], AccessToken $accessToken = null, array $query = [])
    {
        parent::__construct($localConfig, $accessToken, null, $query);
    }

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        if (isset($data['data']) && isset($data['pagination'])) {
            $collection = new Collection();
            foreach ($data['data'] as $d) {
                $collection->push($this->mapObject($d));
            }

            extract($data['pagination']);

            return new LengthAwarePaginator($collection, $total, $limit, $page, [
                'path' => $this->endpoint,
            ]);
        }

        return $data;
    }
}
