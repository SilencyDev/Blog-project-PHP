<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetUserRepository extends Db {
    public function getUser($login) {
        $sql = "SELECT id, email , password, imageId, firstName, lastName, pseudo, 
			dateOfBirth, administrator, profileDate FROM user WHERE email=?";
        $user = $this->executeRequest($sql, array($login));
        if ($user->rowcount() == 1) {
			return $user->fetch();
		}
        else
            throw new \Exception("Your login or password is incorrect");
    }
}