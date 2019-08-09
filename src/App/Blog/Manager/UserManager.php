<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\User;
use API\App\Blog\Factory\GetUserDTOFactory;
use API\App\Blog\Repository\UserRepository;

class UserManager extends Db {

    public function getUser(string $login) {
        $repo = new UserRepository();
        
        return $repo->getUser($login);
    }
    
    public function addUser(string $firstName, string $lastName, string $pseudo, string $password, string $email, $dateOfBirth) {
        $repo = new UserRepository();

        $repo->addUser($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth);
    }

    public function updateUser(string $firstName, string $lastName, string $pseudo, string $password, string $email, $dateOfBirth, boolean $administrator, $profileDate, $request) {
        $repo = new UserRepository();

        $repo->updateUser($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, $request);
    }

    public function deleteUser(int $userId) {
        $repo = new UserRepository();

        $repo->deleteUser($userId);
    }

    public function emailExist(string $email) {
        $repo = new UserRepository();

        return $repo->emailExist($email);
    }

    public function pseudoExist(string $pseudo) {
        $repo = new UserRepository();

        return $repo->pseudoExist($pseudo);
    }
    
	public function userHashVerify(string $login, string $password) {
        $repo = new UserRepository();
        
        return $repo->userHashVerify($login, $password);
	}
}