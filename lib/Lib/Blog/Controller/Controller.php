<?php

namespace API\Lib\Blog\Controller;

use API\Lib\Blog\Request\Request;
use API\Lib\Blog\View\View;

abstract class Controller {

    // Action to execute
    Private $action;

    // Request from GET and POST
    protected $request;

    // Set the request into $request
    public function setRequest(Request $request) {
        $this->request = $request;
    }

    // Execute the action
    public function executeAction($action) {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $controllerClass = get_class($this);
            throw new \Exception("'$action' isn\'t defined into '$controllerClass' class");
        }
    }

    // default Action
    public abstract function index();

    // Create the view for the current controller
    protected function createView($dataView = array()) {
        // setting up the controller name with the current controller
        $controllerClass = get_class($this);
        $controller = str_replace("Controller", "", $controllerClass);
        // Instanciation and creating the view
        $view = new View($this->action, $controller);
        $view->createView($dataView);
    }

    protected function redirect($controller, $action = null) {
        $webRoot = Configuration::get("webRoot", "/");
        // Redirect to $webRoot/$controller/$action
        header("Location:" . $webRoot . $controller . "/" . $action);
    }
}