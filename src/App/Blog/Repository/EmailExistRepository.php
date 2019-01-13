<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class EmailExistRepository extends Db implements RepositoryInterface {
    public function emailExist($email) {
        $sql = 'SELECT COUNT(*) FROM user WHERE email = ?';
        return $this->executeRequest($sql,array($email))->fetchColumn();
    }
}