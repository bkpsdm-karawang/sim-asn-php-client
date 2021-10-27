<?php

use Illuminate\Support\Env;

return [
    /*
    |--------------------------------------------------------------------------
    | Serever and services
    */
    'url' => Env::get('SIM_ASN_URL', 'https://api.sim-asn.bkpsdm.karawangkab.go.id'),
    'client_id' => Env::get('SIM_ASN_CLIENT_ID'),
    'client_secret' => Env::get('SIM_ASN_CLIENT_SECRET'),

    // oauth user service
    'user_enabled' => Env::get('SIM_ASN_USER_ENABLED', true),
    'user_callback' => Env::get('SIM_ASN_USER_CALLBACK', Env::get('APP_URL').'/callback/sim-asn'),
    'user_scope' => Env::get('SIM_ASN_USER_SCOPE', '*'),
    'user_redirect_state' => [],

    // oauth app service
    'app_enabled' => Env::get('SIM_ASN_APP_ENABLED', false),
    'app_token_path' => 'app/app_access_token.json',
    'app_scope' => Env::get('SIM_ASN_APP_SCOPE', '*'),

    /*
    |--------------------------------------------------------------------------
    | SIM-ASN Routes
    */
    'route_proxy_enabled' => false,
    'route_proxy_auto' => true,
    'route_proxy_prefix' => 'sim-asn',
    'route_proxy_middleware' => ['auth'],
];
