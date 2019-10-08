<?php

return [
    'routes' => [
        // The middleware to wrap the auth routes in.
        // Must contain session handling otherwise login will fail.
        'middleware' => 'web',

        // The url that will redirect to the SSO URL.
        // There should be no reason to override this.
        'login' => 'login/microsoft',

        // The app route that SSO will redirect to.
        // There should be no reason to override this.
        'callback' => 'login/microsoft/callback',
    ],
    'credentials' => [
        'client_id' => env('AZURE_AD_CLIENT_ID', ''),
        'client_secret' => env('AZURE_AD_CLIENT_SECRET', ''),
        'redirect' => url('/login/microsoft/callback')
    ],

    // The route to redirect the user to upon login.
    'redirect_on_login' => '/home',

    // The User Eloquent class.
    'user_class' => '\\App\\User',

    // How much time should be left before the access
    // token expires to attempt a refresh.
    'refresh_token_within' => 30,

    // The users table database column to store the user SSO ID.
    'user_id_field' => 'azure_id',

    // How to map azure user fields to Laravel user fields.
    // Do not include the id field above.
    // AzureUserField => LaravelUserField
    'user_map' => [
        'displayName'       => 'name',
        'userPrincipalName' => 'email', // use "userPrincipalName" instead if "mail" is not set

        // Additional AD info
        // Database fields should be set manually
        /*
        'businessPhones'    => 'businessPhones',
        'displayName'       => 'displayName',
        'givenName'         => 'givenName',
        'jobTitle'          => 'jobTitle',
        'mail'              => 'mail',
        'mobilePhone'       => 'mobilePhone',
        'officeLocation'    => 'officeLocation',
        'preferredLanguage' => 'preferredLanguage',
        'surname'           => 'surname',
        'userPrincipalName' => 'userPrincipalName',
        */
    ]
];
