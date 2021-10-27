<?php

namespace SIM_ASN\Laravel\Http\Controllers;

use SIM_ASN\Laravel\Facades\AppClient;

class PegawaiController extends Controller
{
    /**
     * constructor.
     */
    public function __construct(AppClient $manager)
    {
        $this->client = $manager::module('pegawai');
    }
}
