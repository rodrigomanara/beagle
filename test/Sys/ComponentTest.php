<?php

namespace Beagle\Test\Sys;

use Beagle\Test\UnitTest;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ComponentTest
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class ComponentTest extends UnitTest {

    protected $component;

    const __CLASS = 'Beagle\Application\Sys\Component';
    /**
     * 
     */
    public function setUp() {
        $stub = $this->getMockForAbstractClass('Beagle\Application\Sys\Component');
        $this->component = $stub;
    }
    /**
     * 
     */
    public function testGetRequest() {
        $this->assertInstanceOf(Request::class, $this->component->getRequest());
    }

    /**
     * 
     */
    public function testGetDir() {
        $method = self::getMethod('getDir', self::__CLASS);
        $this->assertNull($method->invoke($this->component));
        $this->assertNotEmpty($method->invoke($this->component, self::__CLASS));
    }

}
