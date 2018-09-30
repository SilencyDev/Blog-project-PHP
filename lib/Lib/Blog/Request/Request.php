<?php

namespace API\Lib\Blog\Request;

use API\Lib\Blog\Session\Session;

class Request {

    private $params;

    private $session;

    public function __construct($params) {
        $this->params = $params;
        $this->session = new Session();
    }

    // return true if $params exist
    public function paramsExist($name) {
        return (isset($this->params[$name]) && $this->params[$name] !="");
    }

    // return value from the parameter 
    public function getParams($name) {
        if ($this->paramsExist($name)) {
            return $this->params[$name];
        }
        else
            throw new \Exception("Parameter '$name' missing from request");
    }

    // return associated session
    public function getSession() {
        return $this->session;
    }
}