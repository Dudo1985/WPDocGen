<?php

namespace Dudo1985\WPDocGen;

//PHP 8 is required
if (version_compare(PHP_VERSION, '8.0.0') < 0) {
    echo "ERROR: PHP 8 is required to run WPDocGen, version ". PHP_VERSION. " is installed\n";
    exit(1);
}
const WPDocGenVersion = '2.0.0';


//Reset to terminal default
const ANSI_RESET  = "\033[0m";

//Red ansi color
const ANSI_RED    = "\033[31m";

//Green Ansi color
const ANSI_GREEN  = "\033[32m";

const ANSI_LIGHT_YELLOW = "\033[93m";

//background dark grey
const ANSI_BG_DARK_GREY = "\e[100m";

//Bold
const ANSI_BOLD = "\033[1m";

//italic
const ANSI_ITALIC = "\033[3m";

require 'vendor/autoload.php';

$finder = new WPDocGen();
$finder->init();
