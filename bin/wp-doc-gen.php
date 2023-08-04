<?php

namespace Dudo1985\WPDocGen;

//PHP 8 is required
if (version_compare(PHP_VERSION, '8.0.0') < 0) {
    echo "ERROR: PHP 8 is required to run WPDocGen, version ". PHP_VERSION. " is installed\n";
    exit(1);
}
const WPDocGenVersion = '2.0.3';

require __DIR__ . '/../src/ansi_escape_constants.php';
require __DIR__ . '/../src/functions.php';
require 'vendor/autoload.php';

$finder = new WPDocGen();
$finder->init();
