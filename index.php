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
define("__CACHE", __DIR__ . DIRECTORY_SEPARATOR . "bin/cache" );
define("__UPLOAD", __DIR__ . DIRECTORY_SEPARATOR . "bin/upload" );
define("__FILES", __DIR__ . DIRECTORY_SEPARATOR . "bin/hashed" );

######## email config ######
define("__emailFrom", "");
define("__email","" );
define("__name", "" );
define("pwd_email", "");

###### google recaptcha
define("site_key", "");
define("secret_key", "");

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
define('__database', 'database');
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


