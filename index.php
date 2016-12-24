<?php

############################### #
#                               #
######## default path ######### #
#                               #
############################### #

define("__ROOT", __DIR__  . DIRECTORY_SEPARATOR . "src");
define("__VIEW", __DIR__ .     "/*/*/View");
define("__CONFIG" , __ROOT  .  "/*/Config");
define("__ROUTE" , __DIR__ ."/*/*/Config");
define("__CACHE", __DIR__ . DIRECTORY_SEPARATOR . "bin/cache" );
define("__UPLOAD", __DIR__ . DIRECTORY_SEPARATOR . "bin/upload" );
define("__FILES", __DIR__ . DIRECTORY_SEPARATOR . "bin/hashed" );

######## email config ######
define("__emailFrom", "get-in-touch@rodrigomanara.co.uk");
define("__email","me@rodrigomanara.co.uk" );
define("__name", "Rodrigo Manara" );
define("pwd_email", "asd*7unsa4");

###### google recaptcha
define("site_key", "6LeXR-USAAAAADcOZqqxXV8s3GRS3AX_Um8LoFs_");
define("secret_key", "6LeXR-USAAAAAJ7NQjpy873xMn8EhfyOo1lao5pj");

############# Error ##############
error_reporting( E_ALL );
ini_set('log_errors',1);
ini_set('error_log',__DIR__ . DIRECTORY_SEPARATOR . "bin/error");


/*
 ################################################################
 * 
 *          bittle framework  
 ############################################################### 
 */

include_once './vendor/autoload.php';


#################################################
#                                               #
######## default db connection setup #########  #
#                                               #
#################################################
define('__host', 'localhost');
define('__database', 'portfolio');
define('__username', 'root');
define('__password', '');
define('__charset', 'utf8');
define('__collation', 'utf8_unicode_ci');
define('__prefix', ''); 
define('__driver', 'mysql'); 

##################################
#
######## default start ##########
#                               #
#################################
 

$router = new Application\Helper\Router();
$init = new Application\Sys\init($router);
$init->main();


