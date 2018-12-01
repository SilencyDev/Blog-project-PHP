<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetAddUserRepository extends Db {
    public function getAddUser($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth) {
        $sql = 'INSERT INTO user(firstName, lastName, pseudo, password, email, dateOfBirth, profileDate) VALUES(?, ?, ?, ?, ?, ?, ?)';

        $q = $this->executeRequest($sql,array($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, date("Y/m/d H:i:s")));
    }
}
