<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetDeleteCommentRepository extends Db {
    public function getDeleteComment($commentId) {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $q = $this->executeRequest($sql,array($commentId));
    }
}