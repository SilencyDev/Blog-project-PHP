<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetCountCommentRepository extends Db {
    public function getCountComment() {
        $sql = 'SELECT count(*) FROM comment';

        $countComment = $this->executeRequest($sql)->fetchColumn();
    
        return $countComment;
    }
}