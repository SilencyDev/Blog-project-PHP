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
        if($this->request->paramsExist("login") &&
            $this->request->paramsExist("password")) {
                $login = $this->request->getParams("login");
                $password = $this->request->getParams("password");

                if($this->user->userHashVerify($login, $password)) {
                    $user = $this->user->getUser($login);
                    $this->request->getSession()->setAttribut("id",
                        $user['id']);
                    $this->request->getSession()->setAttribut("imageId",
                        $user['imageId']);
                    $this->request->getSession()->setAttribut("firstName",
                        $user['firstName']);
                    $this->request->getSession()->setAttribut("lastName",
                        $user['lastName']);
                    $this->request->getSession()->setAttribut("email",
                        $user['email']);
                    $this->request->getSession()->setAttribut("dateOfBirth",
                        $user['dateOfBirth']);
                    $this->request->getSession()->setAttribut("administrator",
                        $user['administrator']);
                    $this->request->getSession()->setAttribut("profileDate",
                        $user['profileDate']);
                    
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