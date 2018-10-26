<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;

class UserManager extends Db {

    public function addUser($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, $profileDate) {
        $sql = 'INSERT INTO user(firstName, lastName, pseudo, password, email, dateOfBirth, profileDate) VALUES(?, ?, ?, ?, ?, ?, ?)';
        $firstName = (string) $firstName;
        $lastName = (string) $lastName;
        $pseudo = (string) $pseudo;
        $password = (string) $password;
        $email = (string) $email;

        $q = $this->executeRequest($sql,array($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, date("Y/m/d H:i:s")));
    }

    public function updateUser($imageId, $firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, $profileDate, $request) {
        $q = 'UPDATE user SET imageId = ?, firstName = ?, lastName = ?, pseudo = ?, password = ?, email = ?, dateOfBirth = ?, administrator = ? WHERE id =?';
        $imageId = (int) $imageId;
        $firstName = (string) $firstName;
        $lastName = (string) $lastName;
        $pseudo = (string) $pseudo;
        $password = (string) $password;
        $email = (string) $email;
        $administrator = (boolean) $administrator;

        $q = $this->executeRequest($sql,array($imageId, $firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, date("Y/m/d H:i:s"), $request->getSession()->getAttribut('id')));
    }

    public function deleteUser($userId) {
        $sql = ('DELETE FROM user WHERE id = '.(int) $userId);
        $q = $this->executeRequest($sql,array($userId));

        return $q;
    }

    public function emailExist($email) {
        $sql = 'SELECT COUNT(*) FROM user WHERE email = $email';
        return $this->executeRequest($sql,array($email))->fetchColumn();
    }

    public function pseudoExist($pseudo) {
        $sql = 'SELECT COUNT(*) FROM user WHERE pseudo = $pseudo';
        return $this->executeRequest($sql,array($pseudo))->fetchColumn();
    }
    
	public function userHashVerify($login, $password) {
		$sql = "SELECT password FROM user WHERE email = (?)";
		$passwordHash = $this->executeRequest($sql, array($login));
		$passwordHash = $passwordHash->fetch();
		$passwordHash = $passwordHash["password"];

		return password_verify($password, $passwordHash);
	}

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