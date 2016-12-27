<?php

############################### #
#                               #
######## default path ######### #
#                               #
############################### #

define("__ROOT", __DIR__  . DIRECTORY_SEPARATOR . "src");
define("__VIEW", __DIR__ .     "/*/*/View");
define("__CONFIG" , __ROOT  .  "/*/Config");
define("__ROUTE" , __DIR__ ."/*/*/Config/Router");
define("__CACHE", __DIR__ . DIRECTORY_SEPARATOR . "temp/cache" );
define("__UPLOAD", __DIR__ . DIRECTORY_SEPARATOR . "web/upload" );
define("__FILES", __DIR__ . DIRECTORY_SEPARATOR . "sec/hashed" );
define("__LOGS", __DIR__ . DIRECTORY_SEPARATOR . "temp/log" );

######## email config ######
define("__emailFrom", "");
define("__email","" );
define("__name", "" );
define("pwd_email", "");

###### google recaptcha
define("site_key", "");
define("secret_key", "");

#################################################
#                                               #
######## default db connection setup #########  #
#                                               #
#################################################
define('__host', 'localhost');
define('__database', 'database');
define('__username', 'beagle');
define('__password', 'U0p6zk7MRqAUhfNA');
define('__charset', 'utf8');
define('__collation', 'utf8_unicode_ci');
define('__prefix', ''); 
define('__driver', 'mysql'); 