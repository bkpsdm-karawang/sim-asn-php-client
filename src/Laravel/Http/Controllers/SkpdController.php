<?php

namespace SIM_ASN\Laravel\Http\Controllers;

use SIM_ASN\Laravel\Facades\AppClient;

class UserController extends Controller
{
    /**
     * constructor.
     */
    public function __construct(AppClient $manager)
    {
        $this->client = $manager::module('skpd');
    }
}