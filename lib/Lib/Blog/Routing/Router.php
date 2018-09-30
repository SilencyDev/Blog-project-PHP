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
        $controller = "Home"; // default controller
        if ($request->paramsExist('controller')) {
            $controller = $request->getParams('controller');
            $controller = ucfirst(strtolower($controller));
        }
        // Create the file name of the controller
        $controllerClass =  $controller."Controller";

        $controllerFile = realpath(__DIR__."./../../../../src/App/Blog/Controller/".$controllerClass.".php");
        if (file_exists($controllerFile)) {
            // Instanciation of the controller from the request
            require($controllerFile);
            $controller = new $controllerClass();
            $controller->setRequest($request);
            return $controller;
        }
        else
            throw new \Exception("'$controllerFile' file not found");
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