#!/usr/bin/env php
<?php

use Cryptonaut420\HazahClient\HazahAPI;

/*

# Usage:

export TOKENPASS_PROVIDER_HOST=https://hazah-stage.tokenly.com
export TOKENPASS_CLIENT_ID=xxxxx
export TOKENPASS_CLIENT_SECRET=xxxxx

./check-address-tca.php <address> <rules>

*/ 

require __DIR__.'/init/bootstrap.php';

$api = new HazahAPI();

// get vars
$address = $argv[1];
$rules = json_decode($argv[2], true);

// check
echo "Checking address $address with rules: ".json_encode($rules)."\n";
$result = $api->checkAddressTokenAccess($address, $rules);

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
