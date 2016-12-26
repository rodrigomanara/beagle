<?php

namespace Beagle\Application\Sys;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * 
 * this will be the start will be called once a very time the page is called
 * @author Rodrigo Manara <rmanara@lightspeedresearch>
 */
abstract class Component {

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
        header("location:{$url}");
    }

}
