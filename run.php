<?php

/**
 * Main Openify command-line script
 *
 * Run it like this:
 *
 * php run.php openssl
 *
 * OR
 *
 * php run.php ars
 *
 */
require 'vendor/autoload.php';

use Openify\Hub\OpenHub;

if( isset($argv[1]) ){
    $openHub = new OpenHub($argv[1]);
    $openHub->process();
}
else{
    echo "Usage: php run.php {type}, e.g. php run.php openssl / php run.php ars\n";
}




