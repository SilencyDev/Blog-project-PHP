<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class DeleteNewsRepository extends Db implements RepositoryInterface {
    public function deleteNews($newsId) {
        $sql = 'DELETE FROM news WHERE id = ?';
        $q = $this->executeRequest($sql,array($newsId));
    }
}