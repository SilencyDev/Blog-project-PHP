<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class AddCommentRepository extends Db implements RepositoryInterface {
    public function addComment($newsId, $userId, $content) {
        $sql = 'INSERT INTO comment(newsId, userId, content, creationDate) VALUES(?, ?, ?, ?)';
        $q = $this->executeRequest($sql,array($newsId, $userId, $content, date("Y/m/d H:i:s")));
    }
}