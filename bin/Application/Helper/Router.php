<?php

namespace Beagle\Application\Helper;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Finder\Finder;
use Beagle\Application\Sys\YAMLWrapper;
use Beagle\Application\Sys\Component;
/**
 * Description of Router
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class Router extends Component {

    //put your code here
    private $routeCollection;

    public function __construct() {
        $this->routeCollection = new RouteCollection();
    }

    /**
     * 
     * @return type
     */
    public function getClass() {
        $router = $this->route();
        return array('class' => $router['namespace'] . "\\" . $router['controller'], 'method' => $router['method']);
    }

    /**
     * 
     * @return type
     * @throws Exception
     */
    private function route() {

        $finder = new Finder();
        $finder->files()->in(__ROUTE)->name('*router.yml');
       
        $yaml = new YAMLWrapper();

        foreach ($finder as $file) {
            
            $router = $yaml->read($file->getRealPath());
            if(!is_null($router)) $this->setRouter($router);
            
       
        }
     
 
        $url = $this->rewriteRouter();

        $context = new RequestContext($url);
        $matcher = new UrlMatcher($this->routeCollection, $context);

        if ($this->validateUrl($context, $this->routeCollection)) {
            return $matcher->match($url);
        } else {
            return "";
        }
    }

    private function rewriteRouter() {

        $uri = $this->getRequest()->server->get('REQUEST_URI');
        $script = $this->getRequest()->server->get('SCRIPT_NAME');

        $getFirst = str_replace("index.php", "", $script);
        if (strlen($getFirst) <= 1) {
            $getFirst = $this->getRequest()->server->get('REQUEST_URI');
        } else {
            $get_url = str_replace($getFirst, "", $uri);
            $getFirst = "/$get_url";
        }

        return $getFirst;
    }

    /**
     * 
     * @param array $router
     */
    private function setRouter(array $router) {

        foreach ($router as $key => $router) {
            $this->routeCollection->add(
                    $key, new Route($router['url'], array('controller' => $router['class'], 'method' => $router['method'], 'namespace' => $router['namespace']))
            );
        }
    }

    /**
     * 
     * @return type
     */
    public function getUrl($router = '') {

        $this->route();
        $url = $this->routeCollection->get($router);
        return $url->getPath();
    }

    protected function validateUrl($context, RouteCollection $urls) {

        $validate = false;
        foreach ($urls as $url) {
            if (strpos($url->getPath(), $context->getBaseUrl()) !== false) {
                $validate = true;
            }
        }
        return $validate;
    }

}
