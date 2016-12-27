<?php

namespace Beagle\Test\Application;

use Beagle\Test\UnitTest;
use Beagle\Application\Helper\Router; 
use Symfony\Component\Routing\Route as sfRouter;

/**
 * Description of RouterTest
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 * @backupStaticAttributes disabled
 */
class RouterTest extends UnitTest{
    
    
    private $router;
    
    protected function setUp(){
        $this->router = new Router();
    }
    
    /**
     * 
     */
    public function testRouterCollection(){
        $array = $this->router->getClass();
        $this->assertArrayHasKey('method', $array);
        $this->assertArrayHasKey('class', $array);
        $this->assertArrayHasKey('namespace', $array);
    }
    
    /**
     * 
     */
    public function testGetRouter(){
        
        $method = $this->router->get('default_page');
        $this->assertObjectHasAttribute('defaults',$method );
        $this->assertInstanceOf(sfRouter::class, $method, "method found");
         
    }
}
