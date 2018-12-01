<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetUpdateCommentRepository extends Db {
    public function getUpdateComment($content, $userId) {
        $sql = 'UPDATE comment SET content = ? WHERE id = ?';

        $q = $this->executeRequest($sql,array($content, $request->getParams('commentId')));
    }
}

