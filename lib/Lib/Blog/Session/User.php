<?php

namespace API\Lib\Blog\Session;

use API\Lib\Blog\Model\Db;

class User extends Db {

    // check if the user exist in the database
    public function connect($login, $pswd) {
        $sql = "SELECT id FROM user WHERE email=? and password=?";
        $user= $this->executeRequest($sql, array($login, $pswd));
        return ($user->rowCount() == 1);
    }

    // return the existing user from the database
    public function getUser($login, $password) {
        $sql = "SELECT id AS userId, email AS login, password FROM user WHERE email=? AND password=?";
        $user = $this->executeRequest($sql, array($login, $pswd));
        if ($user->rowcount() == 1)
            return $user->fetch();
        else
            throw new Exception("Your login or password is incorrect");
    }
}