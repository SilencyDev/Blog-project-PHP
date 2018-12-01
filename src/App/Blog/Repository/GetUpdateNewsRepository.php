<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetUpdateNewsRepository extends Db {
    public function getUpdateNews($content, $title, $newsId) {
        $sql = 'UPDATE news SET content = ?, title = ?, updateDate = ? WHERE id = ?';

        $news = $this->executeRequest($sql,array($content, $title, date('Y/m/d H:i:s'), $newsId));
    }
}
