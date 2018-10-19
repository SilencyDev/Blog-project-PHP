<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;

class NewsManager extends Db {

  public function countNews() {
    $sql = ('SELECT COUNT(*) FROM news');

    $news = $this->executeRequest($sql)->fetchColumn();

    return $news;
  }

  public function getNews() {
    $sql = 'SELECT id, userId, title, content, creationDate, updateDate, category FROM news ORDER BY id DESC';
    
    $news = $this->executeRequest($sql);

    return $news;
  }

  public function getUniqueNews($newsId) {
    $sql = "SELECT id, userId, title, content, creationDate, updateDate, category FROM news WHERE id = (?)";
    $newsId = (int) $newsId;

    $aNews = $this->executeRequest($sql,array($newsId));
    if ($aNews->rowcount() > 0) {
      return $aNews->fetch();
    }
    else {
      throw new \Exception("There is no news relative to '$newsId' ID");
    }
  }

  public function addNews($title, $content) {
    $sql = ('INSERT INTO news(title, content) VALUES(?, ?)');
    $title = (string) $title;
    $content = (string) $content;
  

    $news = $this->executeRequest($sql,array($title, $content));

    $news->hydrate([
        'id' => self::$db->lastInsertId(),
        'userId' => $this->request->getSession()->getAttribut("id"),
        'creationDate' => date(),
        'updateDate' => ''
    ]);
  }

  protected function updateNews($content, $title, $category) {
    $sql = $this->executeRequest('UPDATE news SET content = ?, title = ?, category = ? WHERE id ='.$news->getId());
    $content = (string) $content;
    $title =  (string) $title;
    $category = (string) $category;

    $news = $this->executeRequest($sql,array($imageId, $content, $title, $category));

    $news->hydrate([
        'updateDate' => date()
    ]);
  }

  public function deleteNews($id) {
    $sql = ('DELETE FROM news WHERE id = '.(int) $id);
    $q = $this->executeRequest($sql,array($id));

    return $q;
  }
}