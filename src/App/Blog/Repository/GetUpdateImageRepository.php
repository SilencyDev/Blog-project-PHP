<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetUpdateImageRepository extends Db {
    public function getUpdateImage($url, $name, $imageId) {
        $sql = 'UPDATE image SET url = ?, name = ? WHERE imageId =?';

        $q = $this->executeRequest($sql,array($url, $name, $imageId));
    }
}