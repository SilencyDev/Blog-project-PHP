<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class UserHashVerifyRepository extends Db implements RepositoryInterface {
    public function userHashVerify($login, $password) {
		$sql = "SELECT password FROM user WHERE email = (?)";
		$passwordHash = $this->executeRequest($sql, array($login));
		$passwordHash = $passwordHash->fetch();
		$passwordHash = $passwordHash["password"];

		return password_verify($password, $passwordHash);
    }
}