<?php

 

namespace Beagle\Application\Helper;

/**
 * Description of UserHelper
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class UserHelper {
    //put your code here
     public $user;

    public function __construct() {
        $this->user = new UserModel();
    }

    /**
     * 
     * @return type
     */
    public function getLocalInfo() {
        return $this->getRequest()->server->get('AUTH_USER');
    }

    /**
     * 
     * @return type
     */
    public function getIp() {
        return $this->getRequest()->server->get('REMOTE_ADDR');
    }
}
