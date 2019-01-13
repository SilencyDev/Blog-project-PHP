<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class DeleteCommentFromNewsRepository extends Db implements RepositoryInterface {
    public function deleteCommentFromNews($newsId) {
        $sql = 'DELETE FROM comment WHERE newsId = ?';
        $q = $this->executeRequest($sql,array($newsId));
    }
}