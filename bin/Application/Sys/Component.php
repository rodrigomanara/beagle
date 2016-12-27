<?php

namespace Beagle\Application\Sys;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Beagle\Application\Exception\ExceptionRouter;

/**
 * 
 * this will be the start will be called once a very time the page is called
 * @author Rodrigo Manara <rmanara@lightspeedresearch>
 */
abstract class Component {

    CONST ROOT        = __ROOT;
    CONST VIEW        = __VIEW;
    CONST CONFIG      = __CONFIG;
    CONST ROUTE       = __ROUTE;
    CONST CACHE       = __CACHE;
    CONST UPLOAD      = __UPLOAD;
    CONST FILES       = __FILES;
    CONST LOGS        = __LOGS;

    /**
     *
     * @var Symfony\Component\HttpFoundation\Session\Session 
     */
    private $session;

    /**
     * 
     * @return Symfony\Component\HttpFoundation\Session\Session
     */
    protected function getSession() {
        $this->session = new Session();
        $this->session->start();
        return $this->session;
    }

    /**
     * getRequest
     * @return type
     */
    public function getRequest() {
        return new Request($_GET, $_POST, array(), $_COOKIE, $_FILES, $_SERVER);
    }

    /**
     * 
     * @param type $url
     */
    public function redirectTo($url) {

        try {
            exit(header("location:{$url}"));
        } catch (\Exception $e) {
            echo "<meta http-equiv=\"refresh\" content=\"0; url={$url}/\" />";
        }
    }

    /**
     * 
     * @param type $class_name
     * @return type
     */
    protected function getDir($class_name=null) {

        if (is_null($class_name) or empty($class_name)) {
            return null;
        } else {
            try {
                $reflector = new \ReflectionClass($class_name);
                return dirname($reflector->getFileName());
            } catch (\Exception $e) {
                $ex = new ExceptionRouter('component');
                $ex->getLogger()->addDebug($e->getMessage());

                return null;
            }
        }
    }

}
