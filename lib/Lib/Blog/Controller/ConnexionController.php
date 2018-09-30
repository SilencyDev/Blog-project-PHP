<?php

namespace API\Lib\Blog\Controller;

use Lib\Blog\Controller\Controller;
use Lib\Blog\Session\User;

class ConnexionController extends Controller {

    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function index() {
        $this->createView;
    }

    public function connect() {
        if($this->request->existParams("login") &&
            $this->request->existParams("pswd")) {
                $login =$this->request->getParams("login");
                $pswd = $this->request->getParams("pswd");
                if($this->user->connect($login, $pswd)) {
                    $user = $this->user->getUser($login, $pswd);
                    $this->request->getSession()->setAttribut("userId",
                        $user['userId']);
                    $this->request->getSession()->setAttribut("login",
                        $user['login]']);
                    $this->redirect("admin");
                }
                else
                    $this->createView(array('errorMsg' => 'login or password is incorrect'), "index");
            }
            else
                throw new \Exception("Impossible Action : login or password not defined");
    }

    public function disconnect() {
        $this->request->getSession()->destroy();
        $this->redirect("home");
    }
}