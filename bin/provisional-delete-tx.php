#!/usr/bin/env php
<?php

use Tokenly\HazahClient\HazahAPI;

/*

# Usage:

export TOKENPASS_PROVIDER_HOST=https://hazah-stage.tokenly.com
export TOKENPASS_CLIENT_ID=xxxxx
export TOKENPASS_CLIENT_SECRET=xxxxx

./provisional-delete-tx.php <promise_id>

*/ 

require __DIR__.'/init/bootstrap.php';

$api = new HazahAPI();

// get vars
$promise_id = $argv[1];

// check
echo "deleting provisional tx for promise_id $promise_id\n";
$result = $api->deletePromisedTransaction($promise_id);

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
