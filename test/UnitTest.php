<?php

namespace Beagle\Test;


use PHPUnit\Framework\TestCase;

/**
 * Description of UnitTest
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class UnitTest extends TestCase{
    
    
    protected static function getMethod($name , $className) {
        $class = new \ReflectionClass($className);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
}
