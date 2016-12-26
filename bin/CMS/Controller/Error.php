<?php
 

namespace Beagle\CMS\Controller;

/**
 * Description of Error
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class Error { 
    
    
     public function index() {
        
        $this->view("error.html.twig", array());
    }
}
