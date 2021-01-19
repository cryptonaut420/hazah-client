#!/usr/bin/env php
<?php

use Tokenly\HazahClient\HazahAPI;

/*

# Usage:

export TOKENPASS_PROVIDER_HOST=https://hazah-stage.tokenly.com
export TOKENPASS_CLIENT_ID=xxxxx
export TOKENPASS_CLIENT_SECRET=xxxxx

./provisional-delete-source-address.php <address>

*/ 

require __DIR__.'/init/bootstrap.php';

$api = new HazahAPI();

// get vars
$address = $argv[1];
if (!$address) { throw new Exception("Address is required", 1); }

// check
echo "delete $address\n";
$result = $api->deleteProvisionalSource($address);

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
