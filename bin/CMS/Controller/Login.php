<?php

namespace Beagle\CMS\Controller;

/**
 * Description of Login
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class Login {
    //put your code here
    
    public function index() {
        
        $this->view("index.html.twig", array());
    }
}
