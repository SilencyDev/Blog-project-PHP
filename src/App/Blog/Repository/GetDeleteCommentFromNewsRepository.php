<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetDeleteCommentFromNewsRepository extends Db {
    public function getDeleteCommentFromNews($newsId) {
        $sql = 'DELETE FROM comment WHERE newsId = ?';
        $q = $this->executeRequest($sql,array($newsId));
    }
}