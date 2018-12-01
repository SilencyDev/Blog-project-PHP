<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetAddNewsRepository extends Db {
    public function getAddNews($title, $content, $userId) {
        $sql = ('INSERT INTO news(title, content, userId, creationDate) VALUES(?, ?, ?, ?)');

        $news = $this->executeRequest($sql,array($title, $content, $userId, date("Y/m/d H:i:s")));
    
    }
}
