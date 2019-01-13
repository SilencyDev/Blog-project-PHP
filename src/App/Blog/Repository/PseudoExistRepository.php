<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class PseudoExistRepository extends Db implements RepositoryInterface {
    public function pseudoExist($pseudo) {
        $sql = 'SELECT COUNT(*) FROM user WHERE pseudo = ?';
        return $this->executeRequest($sql,array($pseudo))->fetchColumn();
    }
}