<?php

namespace API\Lib\Blog\Routing;

use API\Lib\Blog\Request\Request;
use API\Lib\Blog\View\View;

class Router
{
    public function routerRequest()
    {
        try {
            $this->clear($_POST);
            $this->clear($_GET);
            $request = new Request(array_merge($_POST, $_GET));

            $controller = $this->newController($request);
            $action = $this->newAction($request);

            $controller->executeAction($action);
        } catch (\Exception $e) {
            $this->manageError($e);
        }
    }
    
    private function newController(Request $request)
    {
        $controller = "home";
        if ($request->existParams('controller')) {
            $controller = $request->getParams('controller');
            $controller = ucfirst(strtolower($controller));
        }
        $controllerClass =  "API\\App\\Blog\\Controller\\{$controller}Controller";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            $controller->setRequest($request);
            return $controller;
        }
        throw new \Exception("'$controllerClass' file not found");
    }

    private function newAction(Request $request)
    {
        $action = "index";
        if ($request->existParams('action')) {
            $action = $request->getParams('action');
        }
        return $action;
    }

    private function manageError(\Exception $exception)
    {
        $view = new View('/error/index');
        $view->create(array('errorMsg' => $exception->getMessage()));
    }

    public function clear(&$array)
    {
        array_walk($array, function ($value, $key) {
            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
        });
    }
}
