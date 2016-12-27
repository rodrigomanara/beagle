<?php

namespace Beagle\CMS\Controller;

use Beagle\Application\Sys\AbstractController as Controller;

/**
 * Description of User
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class User extends Controller {

    public function login() {
        $this->view("User/login.html.twig", array());
    }

    public function logout() {
        
        $this->view("User/login.html.twig", array());
    }

    public function register() {

        $this->view("User/register.html.twig", array());
    }

    public function update() {

        $this->view("User/login.html.twig", array());
    }

}
