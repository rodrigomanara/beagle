<?php

/*
 ################################################################
 * 
 *          beagle framework  
 ############################################################### 
 */
include_once './vendor/autoload.php';
include_once './constant.php';

##################################
#
######## default start ##########
#                               #
#################################
 

$router = new Beagle\Application\Helper\Router();
$init = new Beagle\Application\Sys\init($router);
$init->main();


