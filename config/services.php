<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '4735115272-fpflt2fn4g8spaed5uhofhmqa11hqjai.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
//    'facebook' => [
//        'client_id' => '431448458691676',
//        'client_secret' => 'e2624ff2030d5a8c5979d6a691e740fd',
//        'redirect' => 'http://localhost:8000/auth/facebook/callback',
//    ],

];
