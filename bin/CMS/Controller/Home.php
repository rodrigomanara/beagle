<?php


namespace Beagle\CMS\Controller;

/**
 * Description of Home
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class Home {
     //put your code here

    public function index() {
        
        $this->view("index.html.twig", array());
    }
}
