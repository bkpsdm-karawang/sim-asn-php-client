<?php

namespace SIM_ASN\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class BaseListing extends Base
{
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
