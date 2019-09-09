<?php

namespace API\Lib\Blog\Controller;

use API\Lib\Blog\Request\Request;
use API\Lib\Blog\View\View;
use API\Lib\Blog\Config\Configuration;
use API\Lib\Blog\Session\Session;

abstract class Controller
{
    private $action;

    protected $request;

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function executeAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
            return;
        }
        $controllerClass = get_class($this);
        throw new \Exception("'$action' isn\'t defined into '$controllerClass' class");
    }

    abstract public function index();

    protected function createView($data = array())
    {
        $controllerClass = get_class($this);
        $controller = str_replace("API\App\Blog\Controller\\", "", $controllerClass);
        $controller = str_replace("Controller", "", $controller);
        $controller = strtolower($controller);
        $view = new View($this->action, $controller);
        $view->create($data, $this->request);
    }

    protected function redirect($controller, $action = null)
    {
        $webRoot = Configuration::get("webRoot", "/");
        header("Location:" . $webRoot . $controller . "/" . $action);
    }
}
