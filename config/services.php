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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'recaptcha_enterprise' => [
        'site_key' => env('RECAPTCHA_ENTERPRISE_SITE_KEY'),
        'use_credentials' => env('RECAPTCHA_ENTERPRISE_USE_CREDENTIALS', 'default'),
        'score_threshold' => env('RECAPTCHA_ENTERPRISE_SCORE_THRESHOLD', 0.5),
        'credentials' => [
            'default' => [
                'type' => 'service_account',
                'project_id' => env('RECAPTCHA_ENTERPRISE_PROJECT_ID'),
                'private_key_id' => env('RECAPTCHA_ENTERPRISE_PRIVATE_KEY_ID'),
                'private_key' => env('RECAPTCHA_ENTERPRISE_PRIVATE_KEY'),
                'client_email' => $email = env('RECAPTCHA_ENTERPRISE_CLIENT_EMAIL'),
                'client_id' => env('RECAPTCHA_ENTERPRISE_CLIENT_ID'),
                'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
                'token_uri' => 'https://oauth2.googleapis.com/token',
                'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
                'client_x509_cert_url' => 'https://www.googleapis.com/robot/v1/metadata/x509/' . $email,
            ],
        ],
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
