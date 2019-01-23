<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class NewsRepository extends Db implements RepositoryInterface {

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

    public function getNews($page, $newsPerPage, $start) {
        $sql = "SELECT id, userId, title, content, creationDate, updateDate, category FROM news ORDER BY id DESC LIMIT {$start}, {$newsPerPage}";

        return $this->executeRequest($sql)->fetchAll(\PDO::FETCH_ASSOC); 
    }

    public function addNews($title, $content, $userId) {
        $sql = ('INSERT INTO news(title, content, userId, creationDate) VALUES(?, ?, ?, ?)');

        $news = $this->executeRequest($sql,array($title, $content, $userId, date("Y/m/d H:i:s")));
    }

    public function updateNews($content, $title, $newsId) {
        $sql = 'UPDATE news SET content = ?, title = ?, updateDate = ? WHERE id = ?';

        $news = $this->executeRequest($sql,array($content, $title, date('Y/m/d H:i:s'), $newsId));
    }

    public function deleteNews($newsId) {
        $sql = 'DELETE FROM news WHERE id = ?';
        $q = $this->executeRequest($sql,array($newsId));
    }

    public function countNews() {
        $sql = 'SELECT count(*) FROM news';

        $countNews = $this->executeRequest($sql)->fetchColumn();
    
        return $countNews;
    }
}
