<?php

 
namespace Beagle\Application\Sys;

use Beagle\Application\Sys\Component;
use Beagle\Application\Helper\Router;
/**
 * Description of init
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class init extends Component {

    //put your code here
    public $routeCollection = array();

    /**
     * 
     */
    public function __construct(Router $router) {
        $this->routeCollection = $router;
        
    }

    /**
     * 
     */
    public function main() {
        
        
        $getClass = $this->routeCollection->getClass();
 
        if (isset($getClass['method']) and ( empty($getClass['method']) or is_null($getClass['method']))) {
            $this->routeCollection->redirectTo('/error');
        } else {
            $class = new \ReflectionClass($getClass['class']);

            if (!$class->isAbstract() && is_callable(array($getClass['class'], $getClass['method']))) {
                $callClass = new $getClass['class']($this->routeCollection );
                $callClass->{$getClass['method']}();
            } else {
                $this->routeCollection->redirectTo('/error');
            }
        }
    }
     

}
