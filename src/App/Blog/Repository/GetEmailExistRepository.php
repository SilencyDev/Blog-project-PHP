<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetEmailExistRepository extends Db {
    public function getEmailExist($email) {
        $sql = 'SELECT COUNT(*) FROM user WHERE email = ?';
        return $this->executeRequest($sql,array($email))->fetchColumn();
    }
}