<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetValidatedCommentRepository extends Db {
    public function getValidatedComment($newsId) {
        $sql = 'SELECT comment.id, newsId, userId, content, creationDate, pseudo FROM comment LEFT JOIN user ON comment.userId = user.id WHERE newsId = ? and validated = 1 ORDER BY id DESC';
        
        return $this->executeRequest($sql, array($newsId))->fetchAll(\PDO::FETCH_ASSOC);
    }
}