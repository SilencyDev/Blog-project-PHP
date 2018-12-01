<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetPseudoExistRepository extends Db {
    public function getEmailExist($pseudo) {
        $sql = 'SELECT COUNT(*) FROM user WHERE pseudo = ?';
        return $this->executeRequest($sql,array($pseudo))->fetchColumn();
    }
}