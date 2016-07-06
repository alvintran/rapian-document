<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => Nht\User::class,
        'key' => '',
        'secret' => '',
    ],

    'facebook' => [
        'client_id' => '588626674511970',
        'client_secret' => '3554c5dfe5d4dc3fb707a91ce24cafd1',
        'redirect' => 'http://jporder.lc/auth/facebook',
    ]
];
