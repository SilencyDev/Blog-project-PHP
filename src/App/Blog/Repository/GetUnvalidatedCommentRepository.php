<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetUnvalidatedCommentRepository extends Db {
    public function getUnvalidatedComment() {
        $sql = 'SELECT comment.id, newsId, userId, content, creationDate, pseudo, validated FROM comment LEFT JOIN user ON comment.userId = user.id WHERE validated = 0 ORDER BY id ASC';
    
        return $this->executeRequest($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
}