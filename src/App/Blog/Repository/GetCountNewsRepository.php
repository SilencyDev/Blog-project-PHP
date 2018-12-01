<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetCountNewsRepository extends Db {
    public function getCountNews() {
        $sql = 'SELECT count(*) FROM news';

        $countNews = $this->executeRequest($sql)->fetchColumn();
    
        return $countNews;
    }
}