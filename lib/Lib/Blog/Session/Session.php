<?php

namespace API\Lib\Blog\Session;

Class Session {

    public function __construct() {
        session_start();
    }

    public function destroy() {
        session_destroy();
    }

    public function setAttribut($name, $value) {
        $_SESSION[$name] = $value;
    }

    public function getAttribut($name) {
        if($this->existAttribut($name)) {
            return $_SESSION[$name];
        }
        else {
            throw new Exception("'$name' attribut is not found");
        }
    }

    public function existAttribut($name) {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }
}