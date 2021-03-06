#!/usr/bin/env php
<?php

use Cryptonaut420\HazahClient\HazahAPI;

/*

# Usage:

export TOKENPASS_PROVIDER_HOST=https://hazah-stage.tokenly.com
export TOKENPASS_CLIENT_ID=xxxxx
export TOKENPASS_CLIENT_SECRET=xxxxx

./address-details.php <oauth_token> <address>

*/ 

require __DIR__.'/init/bootstrap.php';

$api = new HazahAPI();

$oauth_token = $argv[1];
$address     = $argv[2];
if (!$oauth_token) { throw new Exception("oauth_token is required", 1); }
if (!$address)     { throw new Exception("address is required", 1); }

// check
echo "fetching address details for $address with token ".substr($oauth_token, 0, 4)."...\n";
$result = $api->getAddressDetailsForAuthenticatedUser($address, $oauth_token);


// handle error
if ($result === false) {
    $error_string = $api->getErrorsAsString();
    if ($error_string) {
        echo "ERROR: $error_string\n";
        exit(1);
    }
}

// show the results
echo "\$result: ".json_encode($result, 192)."\n";
