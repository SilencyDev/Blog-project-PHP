<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetDeleteNewsRepository extends Db {
    public function getDeleteNews($newsId) {
        $sql = 'DELETE FROM news WHERE id = ?';
        $q = $this->executeRequest($sql,array($newsId));
    }
}