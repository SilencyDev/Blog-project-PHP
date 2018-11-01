<?php

namespace API\App\Blog\Controller;

use API\Lib\Blog\Controller\Controller;
use API\App\Blog\Entity\User;

class SignInController extends Controller {

    private $user;

    public function __construct() {
        $this->user = new User;
    }

    public function index() {
        $this->createView();
    }

    public function addUser() {

        $pseudo = $this->request->getParams("pseudo");
        $password = $this->request->getParams("password");
        $password2 = $this->request->getParams("password2");
        $email = $this->request->getParams("email");
        $firstName = $this->request->getParams("firstName");
        $lastName = $this->request->getParams("lastName");
        $dateOfBirth = $this->request->getParams("dateOfBirth");

        if(!$this->user->emailExist($email)) {
            if(!$this->user->pseudoExist($pseudo)) {
                if($password == $password2) {
                    $this->user->addUser($firstName, $lastName, $pseudo, password_hash($password, PASSWORD_DEFAULT), $email, $dateOfBirth);
                    $this->redirect("Connect");
                }
                else {
                    throw new \Exception("Your passwords aren't the same");
                }
            }
            else {
                throw new \Exception("This pseudo already exist!");
            }
        }
        else {
            throw new \Exception("This email already exist!");
        }
    }
}