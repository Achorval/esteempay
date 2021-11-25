<?php
session_start();
define('HASH_PASSWORD_KEY', '16e7f5921ab624d62e2b27e8ed84d92a');

define('BASE_URL', 'http://localhost/esteempay/');

define('ASSETS_URL', BASE_URL.'public/');

define('COLOR1','bg-green bg-darken-4');

define('COLOR1HEX','#263238');

define('CARD_TITLE_BG','bg-grey');

define('SITE_TITLE', 'NextStay');

date_default_timezone_set('Africa/Lagos');

define('ACTIVE_THEME','public/themes/site/');

define('USER_THEME','public/themes/view3/');

define('ADMIN_THEME','public/themes/metronic/');

#RAVE API CREDENTIALS
define("RAVE_SECRET","");

#DATABASE CONFIGURATION
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "mysql");
define("DB_NAME", "esteempay");

define("LIBS", "../bootstrap/");
