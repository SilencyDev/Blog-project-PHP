<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetAddImageRepository extends Db {
    public function getAddImage($url, $name) {
        $sql = 'INSERT INTO image(url, name) VALUES(?, ?)';

        $q = $this->executeRequest($sql,array($url, $name));
    }
}