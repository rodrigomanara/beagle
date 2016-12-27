<?php

namespace Beagle\Application\Controller;

use Beagle\Application\Sys\AbstractController as Controller;

/**
 * Description of Default
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class DefaultController extends Controller {

    public function index() {   
        $this->view("Default/index.html.twig", array('error' => ""));
    }

    public function error($error = null) {
        $this->view("Default/error.html.twig", array('error' => $error));
    }

    public function firewall() {

        $text = "too many attempts, are u a robot?";
        $this->view("Default/error.html.twig", array('error' => $text));
    }

}
