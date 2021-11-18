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


//   'facebook' => [
//         'client_id' => "1817561165073998",
//         'client_secret' => "082bb5fe62560dad25607095f95d56b8",
//         'redirect' => 'https://gharsansarnepal.com/login/facebook/callback',
//     ],
    
//      'google' => [
//         'client_id' => "249324865029-qf9uaqi36hapqsjduqr393uege6h93l9.apps.googleusercontent.com",
//         'client_secret' => "l4wWid6lhiXeYd4hWhJZLDJb",
//         'redirect' => 'https://gharsansarnepal.com/auth/google/callback',
//     ],
    
    
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
    'recaptcha' => [
        'key' => env('GOOGLE_RECAPTCHA_KEY'),
        'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
    ],

];
