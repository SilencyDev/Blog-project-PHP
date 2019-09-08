<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class UserRepository extends Db implements RepositoryInterface
{
    public function getUser($login)
    {
        $sql = "SELECT id, email , password, firstName, lastName, pseudo, 
			dateOfBirth, administrator, profileDate FROM user WHERE email=?";
        $user = $this->executeRequest($sql, array($login));
        if ($user->rowcount() == 1) {
            return $user->fetch();
        }
        throw new \Exception("Your login or password is incorrect");
    }

    public function addUser($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth)
    {
        $sql = 'INSERT INTO user(firstName, lastName, pseudo, password, email, dateOfBirth, profileDate) VALUES(?, ?, ?, ?, ?, ?, ?)';

        $q = $this->executeRequest($sql, array($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, date("Y/m/d H:i:s")));
    }

    public function updateUser($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, $request)
    {
        $q = 'UPDATE user SET firstName = ?, lastName = ?, pseudo = ?, password = ?, email = ?, dateOfBirth = ?, administrator = ? WHERE id =?';

        $q = $this->executeRequest($sql, array($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, date("Y/m/d H:i:s"), $request->getSession()->getAttribut('id')));
    }

    public function deleteUser($userId)
    {
        $sql = ('DELETE FROM user WHERE id = '.$userId);

        return $this->executeRequest($sql, array($userId));
    }

    public function pseudoExist($pseudo)
    {
        $sql = 'SELECT COUNT(*) FROM user WHERE pseudo = ?';
        return $this->executeRequest($sql, array($pseudo))->fetchColumn();
    }

    public function emailExist($email)
    {
        $sql = 'SELECT COUNT(*) FROM user WHERE email = ?';
        return $this->executeRequest($sql, array($email))->fetchColumn();
    }

    public function userHashVerify($login, $password)
    {
        $sql = "SELECT password FROM user WHERE email = (?)";
        $passwordHash = $this->executeRequest($sql, array($login));
        $passwordHash = $passwordHash->fetch();
        $passwordHash = $passwordHash["password"];

        return password_verify($password, $passwordHash);
    }
}
