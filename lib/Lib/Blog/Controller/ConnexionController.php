<?php

namespace API\Lib\Blog\Controller;

use API\Lib\Blog\Controller\Controller;
use API\App\Blog\Manager\UserManager;

class ConnexionController extends Controller {
    public function __construct() {
        $this->userManager = new UserManager();
    }

    public function index() {
        $this->createView();
    }

    public function connect() {
        if($this->request->existParams("login") && $this->request->existParams("password")) {
            $login = $this->request->getParams("login");
            $password = $this->request->getParams("password");

            if(!$this->userManager->userHashVerify($login, $password)) {
                $this->redirect("connect");
                $_SESSION['error'] = "Your login or password is incorrect";
                return;
            }
            $user = $this->userManager->getUser($login);  
            foreach($user as $key => $value) {
                $this->request->getSession()->setAttribut($key,$value);
            }
            $this->redirect("Home");
            return;
        }
        throw new \Exception("Impossible Action : login or password not defined");
    }

    public function disconnect() {
        $this->request->getSession()->destroy();
        $this->redirect("home");
    }
}