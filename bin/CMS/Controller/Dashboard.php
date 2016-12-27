<?php

 
namespace Beagle\CMS\Controller;


use Beagle\Application\Sys\AbstractController as Controller;

/**
 * Description of Dashboard
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class Dashboard extends Controller{
    
    
    public function index() {
        $this->view("Dashboard/index.html.twig", array());
    }
    
}
