<?php

namespace Block\Controller;

use Beagle\Application\Sys\AbstractController as Controller;

/**
 * Description of Main
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class Main extends Controller {

    //put your code here

    public function Home() {
        
        $this->view("home.html.twig", array());
    }

}
