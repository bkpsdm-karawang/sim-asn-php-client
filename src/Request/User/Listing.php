<?php

namespace SIM_ASN\Request\User;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use SIM_ASN\Request\Base;
use SIM_ASN\Resource\User;

class Listing extends Base
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/user';

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        if (isset($data['data']) && isset($data['pagination'])) {
            $collection = new Collection();
            foreach ($data['data'] as $user) {
                $collection->push(new User($user));
            }

            extract($data['pagination']);

            return new LengthAwarePaginator($collection, $total, $limit, $page, [
                'path' => $this->endpoint,
            ]);
        }

        return $data;
    }
}
