<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class UpdateImageRepository extends Db implements RepositoryInterface {
    public function updateImage($url, $name, $imageId) {
        $sql = 'UPDATE image SET url = ?, name = ? WHERE imageId =?';

        $q = $this->executeRequest($sql,array($url, $name, $imageId));
    }
}