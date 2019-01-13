<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\User;
use API\App\Blog\Repository\GetUserRepository;
use API\App\Blog\Factory\GetUserDTOFactory;
use API\App\Blog\Repository\DeleteUserRepository;
use API\App\Blog\Repository\UpdateUserRepository;
use API\App\Blog\Repository\AddUserRepository;
use API\App\Blog\Repository\UserHashVerifyRepository;
use API\App\Blog\Repository\EmailExistRepository;
use API\App\Blog\Repository\PseudoExistRepository;

class UserManager extends Db {

    public function addUser(string $firstName, string $lastName, string $pseudo, string $password, string $email, $dateOfBirth) {
        $repo = new AddUserRepository();

        $repo->addUser($firstName, $lastName, $pseudo, $password, $email, $dateOfBirth);
    }

    public function updateUser(int $imageId, string $firstName, string $lastName, string $pseudo, string $password, string $email, $dateOfBirth, boolean $administrator, $profileDate, $request) {
        $repo = new UpdateUserRepository();

        $repo->updateUser($imageId, $firstName, $lastName, $pseudo, $password, $email, $dateOfBirth, $request);
    }

    public function deleteUser(int $userId) {
        $repo = new DeleteUserRepository();

        $repo->deleteUser($userId);
    }

    public function emailExist(string $email) {
        $repo = new EmailExistRepository();

        return $repo->emailExist($email);
    }

    public function pseudoExist(string $pseudo) {
        $repo = new PseudoExistRepository();

        return $repo->pseudoExist($pseudo);
    }
    
	public function userHashVerify(string $login, string $password) {
        $repo = new UserHashVerifyRepository();
        
        return $repo->userHashVerify($login, $password);
	}

    public function getUser(string $login) {
        $repo = new GetUserRepository();
        
        return $repo->getUser($login);
    }
}