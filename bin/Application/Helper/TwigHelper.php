<?php

 
namespace Beagle\Application\Helper;


use Symfony\Component\HttpFoundation\Request;
use Beagle\Application\Helper\Router;
/**
 * Description of TwigHelper
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class TwigHelper extends \Twig_Extension  {
    //put your code here
    protected $router;

    /**
     * 
     */
    public function __construct() {
        $this->router = new Router();
    }

    /**
     * getRequest
     * @return type
     */
    public function getRequest() {
        return new Request($_GET, $_POST, array(), $_COOKIE, $_FILES, $_SERVER);
    }

    /**
     * 
     * @return type
     */
    public function getGlobals() {
        return array(
            'base_url' => "{$this->getRequest()->getScheme()}://" . $this->getRequest()->getHost(),
        );
    }
}
