<?php

namespace API\Lib\Blog\Controller;

use API\Lib\Blog\Controller\Controller;
use API\App\Blog\Entity\User;

class ConnexionController extends Controller {

    protected $user;

    public function __construct() {
        $this->user = new User();
    }

    public function index() {
        $this->createView();
    }

    public function connect() {
        if($this->request->existParams("login") &&
            $this->request->existParams("password")) {
                $login = $this->request->getParams("login");
                $password = $this->request->getParams("password");

                if($this->user->userHashVerify($login, $password)) {
                    $user = $this->user->getUser($login);

                    foreach($user as $key => $value) {
                    $this->request->getSession()->setAttribut($key,$value);
                    }

                    $this->redirect("admin");
                }
                else {
                    $this->redirect("connect");
                    $_SESSION['error'] = "Your login or password is incorrect";
                }
            }
            else
                throw new \Exception("Impossible Action : login or password not defined");
    }

    public function disconnect() {
        $this->request->getSession()->destroy();
        $this->redirect("home");
    }
}