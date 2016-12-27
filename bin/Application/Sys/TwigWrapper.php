<?php

namespace Beagle\Application\Sys;

use Symfony\Component\Finder\Finder;
use Beagle\Application\Helper\TwigExtension;
use Beagle\Application\Helper\Router;
use Beagle\Application\Sys\Component;

/**
 * Description of TwigWrapper
 *
 * @author rodrigo
 */
class TwigWrapper extends Component {

    private $router;

    /**
     *
     * @var type 
     */
    protected $twig;

    /**
     *
     * @var type 
     */
    protected $loader;

    /**
     * 
     */
    public function __construct(Router $router) {

        $this->router = $router;




        $this->loader = new \Twig_Loader_Filesystem($this->getDirectories());
        $this->twig = new \Twig_Environment($this->loader, array());

        $this->appendExtension();
    }

    /**
     * 
     * @return type
     */
    public function getEnviroment() {
        return $this->twig;
    }

    /**
     * 
     */
    public function appendExtension() {
        $this->twig->addExtension(new \Twig_Extension_Debug());
        $this->twig->addExtension(new TwigExtension());
    }

    /**
     * list all directTories
     * @return array
     */
    private function getDirectories() {

        // if the direct from get final path is only one
        // look into it all folder inside the directory and find only twig 
        if (!is_array($this->getFinalPath())) {
            $finder = new Finder();
            $finder->files()->in($this->getFinalPath())->name("*.twig");

            $path = array();
            $path[$this->getFinalPath()] = $this->getFinalPath();
            foreach ($finder as $file) {
                $path[$file->getPath()] = $file->getPath();
            }
            return $path;
        }
        return $this->getFinalPath();
    }

    /**
     * only get the path defined on the URL otherwise look into all Directories VIEW
     * @return type
     */
    private function getFinalPath() {

        $class_name = $this->router->getClass();
        $path_view = $this->getDir($class_name['class']);

        // if the path view is null
        //otherwise look into all directories VIEW
        if (is_null($path_view)) {
            $finder = new Finder();
            $finder->directories()->in(__VIEW);
            $path_view = array();
            foreach ($finder as $file) {
                $path_view[$file->getPath()] = $file->getPath();
            }
        }
        //look get path from a direct found by class dir
        else {
            $temp = explode("/", $path_view);
            array_pop($temp);
            $path_view = implode("/", $temp);
            $path_view = "{$path_view}/View";
        }
        return $path_view;
    }

}
