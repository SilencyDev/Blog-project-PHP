<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class AddImageRepository extends Db implements RepositoryInterface {
    public function addImage($url, $name) {
        $sql = 'INSERT INTO image(url, name) VALUES(?, ?)';

        $q = $this->executeRequest($sql,array($url, $name));
    }
}