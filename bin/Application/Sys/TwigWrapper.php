<?php

namespace Beagle\Application\Sys;

use Symfony\Component\Finder\Finder;
use Beagle\Application\Helper\TwigExtension;

/**
 * Description of TwigWrapper
 *
 * @author rodrigo
 */
class TwigWrapper {

    //put your code here
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
    public function __construct() {


        $finder = new Finder();
        $finder->files()->in(__VIEW)->name("*.twig");

        $path = array();
        foreach ($finder as $file) {
            $path[] = $file->getPath();
        }
         

        $this->loader = new \Twig_Loader_Filesystem($path);
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

}
