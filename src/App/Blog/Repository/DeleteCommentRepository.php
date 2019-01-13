<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class DeleteCommentRepository extends Db implements RepositoryInterface {
    public function deleteComment($commentId) {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $q = $this->executeRequest($sql,array($commentId));
    }
}