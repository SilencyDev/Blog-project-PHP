<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetDeleteImageRepository extends Db {
    public function getDeleteImage($imageId) {
        $sql = 'DELETE FROM image WHERE id = ?';

        $q = $this->executeRequest($sql,array($imageId));
    }
}