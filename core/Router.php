<?php
namespace core;

use core\Controller;
use controllers\NotFoundController;
use controllers\UserController;
use core\View;
class Router
{
    /** @var  array */
    private $pathParts = [];

    /** @var Controller */
    private $controller;

    /** @var string */
    private $action;

    public $controllerName;

    public $indicator;

    public function __construct()
    {
        $this->pathParts = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($this->pathParts);

    }

    public function getData(): array
    {
        return array_slice($this->pathParts, 2);
    }

    public function getController(): Controller
    {
        if (!$this->controller) {
            $this->initController();
        }

        return $this->controller;
    }

    public function initController()
    {


        $controllerName = $this->pathParts[0] ?: 'home';
        $controllerName = ucfirst(strtolower(trim($controllerName)));
        $controllerName .= 'Controller';
        $controllerName = '\controllers\\' . $controllerName;
        $this->controllerName = $controllerName;
        if (class_exists($controllerName, true)) {
            $view = new View();
            $this->controller = new $controllerName($view);
            $view->setController($this->controller);

        } else {
            $this->initNotFoundRoute();
        }
    }

    public function getAction(): string
    {


        if (!$this->action) {
            $this->initAction();
        }

        return $this->action;
    }

    private function initAction()
    {

        $actionName = $this->pathParts[1] ?? 'index';
        $actionName = ucfirst(strtolower(trim($actionName)));


        if ($this->controllerName == '\controllers\UserController') {
            $this->initUserController($actionName);
        } else {
            $actionName = 'action' . $actionName;
            if (method_exists($this->getController(), $actionName)) {

                $this->action = $actionName;

            } else {
                $this->initNotFoundRoute();
            }
        }
    }


    private function initNotFoundRoute()
    {
        $view = new View();
        $this->controller = new NotFoundController($view);
        $view->setController($this->controller);

        $this->action = 'action404';
    }

//
    private function initUserController($action)
    {


        $view = new View();
        $this->controller = new UserController($view);
        $view->setController($this->controller);
        $action = strtolower(trim($action));

        $GLOBALS['action'] = $action;
        $this->action = 'actionIndex';



    }

}