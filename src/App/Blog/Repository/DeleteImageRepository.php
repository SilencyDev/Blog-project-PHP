<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class DeleteImageRepository extends Db implements RepositoryInterface {
    public function deleteImage($imageId) {
        $sql = 'DELETE FROM image WHERE id = ?';

        $q = $this->executeRequest($sql,array($imageId));
    }
}