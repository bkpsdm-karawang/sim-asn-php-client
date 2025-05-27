<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\File;
use SIM_ASN\Request\BaseListing;

class PhotoProfile extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = File::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me/pegawai/photo_profile';
}
