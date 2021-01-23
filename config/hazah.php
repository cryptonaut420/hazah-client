<?php

return [
    // scopes to authenticate with
    'scopes' => env('HAZAH_AUTH_SCOPES', 'user,tca'),

    // Enter your client id and client secret from Hazah here
    'client_id' => env('HAZAH_CLIENT_ID', null),
    'client_secret' => env('HAZAH_CLIENT_SECRET', null),

    // for privileged admin Hazah access
    'privileged_client_id' => env('HAZAH_PRIVILEGED_CLIENT_ID', null),
    'privileged_client_secret' => env('HAZAH_PRIVILEGED_CLIENT_SECRET', null),

    // for privileged first-party Hazah authentication
    'oauth_client_id' => env('HAZAH_OAUTH_CLIENT_ID', null),
    'oauth_client_secret' => env('HAZAH_OAUTH_CLIENT_SECRET', null),

    // this is the URL that Hazah uses to redirect the user back to your application
    //   e.g. https://YourSiteHere.com/account/authorize/callback
    'redirect_uri' => env('HAZAH_REDIRECT_URI', env('APP_URL', 'http://127.0.0.1').'/account/authorize/callback'),

    // this is the Hazah URL
    'hazah_url' => rtrim(env('HAZAH_PROVIDER_HOST', 'https://app.hazah.io'), '/'),

    // route prefix
    'route_prefix' => env('HAZAH_ROUTE_PREFIX', 'hazah'),

];
