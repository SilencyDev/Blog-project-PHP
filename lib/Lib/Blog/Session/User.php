<?php

namespace API\Lib\Blog\Session;

use API\Lib\Blog\Model\Db;

class User extends Db
{
    public function connect($login, $password)
    {
        $sql = "SELECT id FROM user WHERE email=? and password=?";
        $user= $this->executeRequest($sql, array($login, $password));
        return ($user->rowCount() == 1);
    }

    public function getUser($login, $password)
    {
        $sql = "SELECT id, email AS login, password FROM user WHERE email=? AND password=?";
        $user = $this->executeRequest($sql, array($login, $password));
        if ($user->rowcount() == 1) {
            return $user->fetch();
        }
        throw new \Exception("Your login or password is incorrect");
    }
}
