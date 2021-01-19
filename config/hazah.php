<?php

return [
    // scopes to authenticate with
    'scopes' => env('TOKENPASS_AUTH_SCOPES', 'user,tca'),

    // Enter your client id and client secret from Hazah here
    'client_id' => env('TOKENPASS_CLIENT_ID', null),
    'client_secret' => env('TOKENPASS_CLIENT_SECRET', null),

    // for privileged admin Hazah access
    'privileged_client_id' => env('TOKENPASS_PRIVILEGED_CLIENT_ID', null),
    'privileged_client_secret' => env('TOKENPASS_PRIVILEGED_CLIENT_SECRET', null),

    // for privileged first-party Hazah authentication
    'oauth_client_id' => env('TOKENPASS_OAUTH_CLIENT_ID', null),
    'oauth_client_secret' => env('TOKENPASS_OAUTH_CLIENT_SECRET', null),

    // this is the URL that Hazah uses to redirect the user back to your application
    //   e.g. https://YourSiteHere.com/account/authorize/callback
    'redirect_uri' => env('TOKENPASS_REDIRECT_URI', env('APP_URL', 'http://127.0.0.1').'/account/authorize/callback'),

    // this is the Hazah URL
    'hazah_url' => rtrim(env('TOKENPASS_PROVIDER_HOST', 'https://hazah.tokenly.com'), '/'),

    // route prefix
    'route_prefix' => env('TOKENPASS_ROUTE_PREFIX', 'account'),

];
