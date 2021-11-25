<?php
// Report all errors except E_NOTICE
error_reporting( E_ALL & ~E_STRICT );

// Report all PHP errors (see changelog)
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

require_once "config/config.php";
/*
function __autoload($class) {
	require_once LIBS . $class .".php";
}   */

require_once "bootstrap/Bootstrap.php";
require_once "libs/Model.php";
require_once "libs/View.php";
require_once "libs/BaseController.php";
require_once "libs/Session.php";
require_once "libs/Hash.php";
require_once "libs/Database.php";
require_once "config/config.php";
require_once "libs/Help/phpqrcode/qrlib.php";


$app = new Bootstrap;
