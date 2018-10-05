<?php

namespace API\Lib\Blog\Routing;

use API\Lib\Blog\Request\Request;
use API\Lib\Blog\View\View;

class Router {

    public function routerRequest() {
        try {
            // Regroup POST and GET into the request
            $request = new Request(array_merge($_POST, $_GET));

            $controller = $this->newController($request);
            $action = $this->newAction($request);

            $controller->executeAction($action);
        }
        catch (Exception $e) {
            $this->manageError($e);
        }
    }
    
    // Create a controller from the request
    private function newController(Request $request) {
        $controller = "home"; // default controller
        if ($request->paramsExist('controller')) {
            $controller = $request->getParams('controller');
            $controller = ucfirst(strtolower($controller));
        }
        // Create the file name of the controller
        $controllerClass =  "\\API\\App\\Blog\\Controller\\{$controller}Controller";

        if (class_exists($controllerClass)) {
            // Instanciation of the controller from the request
            $controller = new $controllerClass();
            $controller->setRequest($request);
            return $controller;
        }
        else
            throw new \Exception("'$controllerClass' file not found");
    }

    // Looking for an action to execute from the request
    private function newAction(Request $request) {
        $action = "index"; // default action
        if ($request->paramsExist('action')) {
            $action = $request->getParams('action');
        }
        return $action;
    }

    // Display an error
    private function manageError(Exception $exception) {
        $view = new View('error');
        $view->create(array('errorMsg' => $exception->getMessage()));
    }
}