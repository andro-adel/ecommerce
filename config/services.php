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

    'facebook' => [
        'client_id' => '3635206376704901',
        'client_secret' => '94e13ec4799c637584fe6b05b092512e',
        'redirect' => 'https://127.0.0.1:8000/sign-in/facebook/redirect',
    ],

    'google' => [
        'client_id' => '858945957063-825jrmcmui5j3h4pl39s9kaihqcj0ad9.apps.googleusercontent.com',
        'client_secret' => '8r8GdGgAcU0ZXgjHStXxOx4V',
        'redirect' => 'https://127.0.0.1:8000/sign-in/google/redirect',
    ],

];
