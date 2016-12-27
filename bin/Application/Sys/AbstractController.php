<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Beagle\Application\Sys;

use Beagle\Application\Sys\Component;
use Beagle\Application\Sys\TwigWrapper;
use Beagle\Application\Helper\Router;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Description of AbstractController
 *
 * @author rodrigo
 */
abstract class AbstractController extends Component {

    protected $user;

    /**
     *
     * @var twig object 
     */
    private $twig;

    /**
     *
     * @var Router 
     */
    private $router;

    /**
     * 
     * @param Router $router
     * @param Session $session
     */
    public function __construct(Router $router) {
        //setup main components
        $this->router = $router;
        $this->twig = new TwigWrapper($router);  
    }

    protected function getRouter() {
        return $this->router;
    }

    /**
     * view 
     * @param unknown $file_twig
     * @param array $args
     * @throws \Exception
     */
    public function view($file_twig, array $args) {
        try {
            $template = $this->twig->getEnviroment()->load($file_twig);
            $template->display($args);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * 
     * @param type $file_twig
     * @param array $args
     * @return string
     * @throws \Exception
     */
    public function render($file_twig, array $args) {
        try {
            $template = $this->twig->getEnviroment()->load($file_twig);
            return $template->render($args);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

}
