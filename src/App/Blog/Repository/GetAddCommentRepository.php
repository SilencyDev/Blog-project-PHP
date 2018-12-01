<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetAddCommentRepository extends Db {
    public function getAddComment($newsId, $request, $content) {
        $sql = 'INSERT INTO comment(newsId, userId, content, creationDate) VALUES(?, ?, ?, ?)';
        $q = $this->executeRequest($sql,array($newsId, $this->request->getParams("id"), $content, date("Y/m/d H:i:s")));
    }
}