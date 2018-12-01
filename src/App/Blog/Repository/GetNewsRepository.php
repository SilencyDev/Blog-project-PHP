<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetNewsRepository extends Db {
    public function getNews() {
        $sql = 'SELECT id, userId, title, content, creationDate, updateDate, category FROM news ORDER BY id DESC';

        return $this->executeRequest($sql)->fetchAll(\PDO::FETCH_ASSOC); 
    }
}