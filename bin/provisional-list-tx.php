#!/usr/bin/env php
<?php

use Tokenly\HazahClient\HazahAPI;

/*

# Usage:

export TOKENPASS_PROVIDER_HOST=https://hazah-stage.tokenly.com
export TOKENPASS_CLIENT_ID=xxxxx
export TOKENPASS_CLIENT_SECRET=xxxxx

./provisional-list-tx.php

*/ 

require __DIR__.'/init/bootstrap.php';

$api = new HazahAPI();


// check
echo "listing promises\n";
$result = $api->getPromisedTransactionList();


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
