<?php

namespace Application\Controller;

use Application\Sys\AbstractController as Controller;

/**
 * Description of Default
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class DefaultController extends Controller {

//put your code here

    public function index() {
       
        $this->view("error.html.twig", array('error' => ""));
    }

    public function firewall() {

        $text = "too many attempts, are u a robot?";
        $this->view("error.html.twig", array('error' => $text));
    }

}
