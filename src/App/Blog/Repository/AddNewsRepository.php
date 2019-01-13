<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class AddNewsRepository extends Db implements RepositoryInterface {
    public function addNews($title, $content, $userId) {
        $sql = ('INSERT INTO news(title, content, userId, creationDate) VALUES(?, ?, ?, ?)');

        $news = $this->executeRequest($sql,array($title, $content, $userId, date("Y/m/d H:i:s")));
    
    }
}
