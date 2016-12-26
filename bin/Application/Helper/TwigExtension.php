<?php


namespace Beagle\Application\Helper;

use Symfony\Component\Finder\Finder;
use Beagle\Application\Helper\TwigHelper;

/**
 * Description of TwigExtension
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class TwigExtension extends TwigHelper{
    //put your code here
    public function getFunctions() {

        return array(
            new \Twig_SimpleFunction('url', array($this->router, 'getUrl')),
            new \Twig_SimpleFunction('asset', array($this, 'findCssFiles'))
        );
    }

    public function findCssFiles($path) {
         
        $finder = new Finder();
        $finder->files()->in(__ROOT . "/*/*/View")->name($path);

        foreach ($finder as $file) {
            return $file->getRelativePathName();
        }
    }
}
