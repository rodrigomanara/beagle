<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Beagle\Application\Exception;

use Monolog\Logger;
use Monolog\Handler\SyslogHandler;

/**
 * Description of ExceptionWrapper
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class ExceptionWrapper {

    /**
     *
     * @var Logger
     */
    private $log;
    /**
     * 
     * @param type $name
     * @param type $level
     */
    public function __construct($name, $level = Logger::DEBUG) {
        $this->log = new Logger($name);
        $this->log->pushHandler(new SyslogHandler(__LOGS . DIRECTORY_SEPARATOR . "{$name}.logs", $level));

    }
    public function getLogger(){
        return $this->log;
    }

}
