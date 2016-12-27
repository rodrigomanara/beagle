<?php

namespace Beagle\Application\Sys;

use Beagle\Application\Sys\Component;
use Beagle\Application\Helper\Router;
use Beagle\Application\Exception\ExceptionRouter;

/**
 * Description of init
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
final class init extends Component {
 
    
    //put your code here
    public $routeCollection = array();

    /**
     * 
     */
    public function __construct(Router $router) {
        $this->routeCollection = $router;
    }

    /**
     * void method
     */
    public function main() {


        $getClass = $this->routeCollection->getClass();

        try {
            $class = new \ReflectionClass($getClass['class']);


            if (!$class->isAbstract() && is_callable(array($getClass['class'], $getClass['method']))) {
                $callClass = new $getClass['class']($this->routeCollection);
                $callClass->{$getClass['method']}();
            } 
        } catch (\Exception $e) {
            $ex = new ExceptionRouter('init');
            $ex->getLogger()->addDebug($e->getMessage());
            
            $getClass = $this->routeCollection->get('error_page');
            $getClass = $this->routeCollection->getClass($getClass->getDefaults());
           
            $callClass = new $getClass['class']($this->routeCollection);
            
          $callClass->{$getClass['method']}($this->textError($e));
        }
    }
    
    
    private function textError(\Exception $e){
          $text = sprintf("%s " . PHP_EOL . " %s %s %s" , $e->getMessage() , $e->getFile() , $e->getPrevious() , $e->getTraceAsString());
          $text .= sprintf(PHP_EOL . "%s" . PHP_EOL."%s" .PHP_EOL , " check config Folder" , "Look into Router.yml");
            
          return $text;
    }

}
