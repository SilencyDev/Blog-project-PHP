<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetANewsRepository extends Db implements RepositoryInterface {
    public function getANews($newsId) {
        $sql = "SELECT id, userId, title, content, creationDate, updateDate, category FROM news WHERE id = ?";

        $aNews = $this->executeRequest($sql,array($newsId));
      
        if($aNews->rowcount() > 0) {
          return $aNews->fetchAll(\PDO::FETCH_ASSOC);
        }
        else {
          throw new \Exception("There is no news relative to '$newsId' ID");
        }
    }
}