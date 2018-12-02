<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetValidCommentRepository extends Db {
    public function getValidComment($commentId) {
    $sql = 'UPDATE comment SET validated = 1 WHERE id = ?';

    $q = $this->executeRequest($sql,array($commentId));
    }
}