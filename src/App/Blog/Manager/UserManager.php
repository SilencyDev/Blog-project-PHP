<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\User;
use API\App\Blog\Repository\GetUserRepository;
use API\App\Blog\Factory\GetUserDTOFactory;
use API\App\Blog\Repository\GetDeleteUserRepository;
use API\App\Blog\Repository\GetUpdateUserRepository;
use API\App\Blog\Repository\GetAddUserRepository;
use API\App\Blog\Repository\GetUserHashVerifyRepository;
use API\App\Blog\Repository\GetEmailExistRepository;
use API\App\Blog\Repository\GetPseudoExistRepository;

class UserManager extends Db {

    public function addUser(string $firstName, string $lastName, string $pseudo, string $password, string $email, $dateOfBirth) {
        $repo = new GetAddUserRepository();

        $repo->getAddUser($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth);
    }

    public function updateUser(int $imageId, string $firstName, string $lastName, string $pseudo, string $password, string $email, $dateOfBirth, boolean $administrator, $profileDate, $request) {
        $repo = new GetUpdateUserRepository();

        $repo->getUpdateUser($imageId, $firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, $request);
    }

    public function deleteUser(int $userId) {
        $repo = new GetDeleteUserRepository();

        $repo->getDeleteUser($userId);
    }

    public function emailExist(string $email) {
        $repo = new GetEmailExistRepository();

        return $repo->getEmailExist($email);
    }

    public function pseudoExist(string $pseudo) {
        $repo = new GetPseudoExistRepository();

        return $repo->getPseudoExist($pseudo);
    }
    
	public function userHashVerify(string $login, string $password) {
        $repo = new GetUserHashVerifyRepository();
        
        return $repo->getUserHashVerify($login, $password);
	}

    public function getUser(string $login) {
        $repo = new GetUserRepository();
        
        return $repo->getUser($login);
    }
}