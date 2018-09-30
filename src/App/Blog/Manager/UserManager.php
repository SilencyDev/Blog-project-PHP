<?php

namespace API\App\Blog\Model;

use \Lib\Blog\Model\Db;

class UserManager {

    public function addUser(User $user) {
        $q = $this->getDb->prepare('INSERT INTO user(firstName, lastName, pseudo, password, email, dateOfBirth) VALUES(:firstName, :lastName, :pseudo, :password, :email, :dateOfBirth)');
        $q->bindValue(':firstName', $user->getFirstName(), PDO::PARAM_STRING);
        $q->bindValue(':lastName', $user->getLastName(), PDO::PARAM_STRING);
        $q->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STRING);
        $q->bindValue(':password', $user->getPassword(), PDO::PARAM_STRING);
        $q->bindValue(':email', $user->getEmail(), PDO::PARAM_STRING);
        $q->bindValue(':dateOfBirth', $user->getDateOfBirth()->format('d/m/Y'), PDO::PARAM_INT);

        $q->execute();

        $user->hydrate([
            'id' => $this->db->lastInsertId(),
            'imageId'=> 1,
            'administrator' => 0,
            'profileDate' => date('')->format('d/m/Y')
        ]);
    }

    public function updateUser(User $user) {
        $q->getDb()->prepare('UPDATE user SET imageId = :imageId, firstName = :firstName, lastName = :lastName, pseudo = :pseudo, password = :password, email = :email, dateOfBirth = :dateOfBirth, administrator = :administrator WHERE id ='.$user->id());
        $q->bindValue(':imageId', $user->getImageId(), PDO::PARAM_INT);
        $q->bindValue(':firstName', $user->getFirstName(), PDO::PARAM_STRING);
        $q->bindValue(':lastName', $user->getLastName(), PDO::PARAM_STRING);
        $q->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STRING);
        $q->bindValue(':password', $user->getPassword(), PDO::PARAM_STRING);
        $q->bindValue(':email', $user->getEmail(), PDO::PARAM_STRING);
        $q->bindValue(':dateOfBirth', $user->getDateOfBirth()->format('d/m/Y'), PDO::PARAM_INT);
        $q->bindValue(':administrator', $user->getAdministrator(), PDO::PARAM_BOOLEAN);

        $q->execute();
    }

    public function deleteUser(User $user) {
        $this->getDb()->exec('DELETE from user WHERE id ='.$user->id());
    }

    public function emailExist($email) {
        return $this->getDb->query('SELECT COUNT(*) FROM user WHERE email = $email')->fetchColumn();
    }

    public function pseudoExist($pseudo) {
        return $this->getDb->query('SELECT COUNT(*) FROM user WHERE pseudo = $pseudo')->fetchColumn();
    }
}