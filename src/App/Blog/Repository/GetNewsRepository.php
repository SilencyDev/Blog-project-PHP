<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetNewsRepository extends Db implements RepositoryInterface {
    public function getNews($page, $newsPerPage, $start) {
    $sql = "SELECT id, userId, title, content, creationDate, updateDate, category FROM news ORDER BY id DESC LIMIT {$start}, {$newsPerPage}";

        return $this->executeRequest($sql)->fetchAll(\PDO::FETCH_ASSOC); 
    }
}