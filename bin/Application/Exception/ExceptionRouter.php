<?php

namespace Beagle\Application\Exception;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Beagle\Application\Sys\Component;
/**
 * Description of ExceptionHandler
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class ExceptionRouter extends Component{
     
    /**
     *
     * @var Logger
     */
    private $log;

    public function __construct($name = 'logs', $level = Logger::WARNING, $bubble = true) {
      
        $this->log = new Logger($name);
        $this->log->pushHandler(new StreamHandler(self::LOGS . DIRECTORY_SEPARATOR .  "{$name}.log", $level));
        
    }
    
    public function getLogger(){
        return $this->log;
    }
 
 

}
