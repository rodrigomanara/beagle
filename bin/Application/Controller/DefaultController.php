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
       
        $this->view("index.html.twig", array('error' => ""));
    }

    public function error() {
       
        $this->view("error.html.twig", array('error' => ""));
    }

    public function firewall() {

        $text = "too many attempts, are u a robot?";
        $this->view("error.html.twig", array('error' => $text));
    }

}
