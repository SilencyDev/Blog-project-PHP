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

    public function newUser() {
        $pseudo = $this->request->getParams("pseudo");
        $password = $this->request->password_hash(getParams("password"));
        $password2 = $this->request->password_hash(getParams("password2"));
        $email = $this->request->getParams("email");
        $firstName = $this->request->getParams("firstName");
        $lastName = $this->request->getParams("lastName");
        $dateOfBirth = $this->request->getParams("dateOfBirth");

        if(!emailExist($email)) {
            if(!pseudoExist($pseudo)) {
                if($password == $password2) {
                    $this->user->addUser($user);
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