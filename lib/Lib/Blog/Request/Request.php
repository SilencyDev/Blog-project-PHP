<?php

namespace API\Lib\Blog\Request;

use API\Lib\Blog\Session\Session;

class Request
{
    private $params;

    private $session;

    public function __construct($params)
    {
        $this->params = $params;
        $this->session = new Session();
    }

    public function existParams($name)
    {
        return (isset($this->params[$name]) && $this->params[$name] !="");
    }

    public function getParams($name)
    {
        if ($this->existParams($name)) {
            return $this->params[$name];
        }
        throw new \Exception("Parameter '$name' missing from request");
    }

    public function getSession()
    {
        return $this->session;
    }
}
