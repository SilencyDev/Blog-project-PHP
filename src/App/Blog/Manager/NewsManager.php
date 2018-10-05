<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;

// $this->executeRequest()
class NewsManager extends Db {

  public function countNews() {
    return $this->executeRequest('SELECT COUNT(*) FROM news')->fetchColumn();
  }

  public function getNews() {
    $sql = 'SELECT id, userId, title, content, creationDate, updateDate, category, imageId FROM news ORDER BY id DESC';
    
    $news = $this->executeRequest($sql);

    return $news;
  }

  public function getUniqueNews($newsId) {
    $sql = "SELECT id, userId, title, content, creationDate, updateDate, category, imageId FROM news WHERE (?)";
    $newsId = (int) $newsId;

    $aNews = $this->executeRequest($sql,array($newsId));
    if ($aNews->rowcount() > 0) {
      return $aNews->fetch();
    }
    else {
      throw new \Exception("There is no news relative to '$newsId' ID");
    }
  }

  protected function addNews(News $news) {
    $q = $this->executeRequest('INSERT INTO news(imageId, content, title, category) VALUES(:imageId, :content, :title, :category)');
    $q->bindValue(':imageId', $news->getImageId(), PDO::PARAM_INT);
    $q->bindValue(':content', $news->getContent(), PDO::PARAM_STRING);
    $q->bindValue(':title', $news->getTitle(), PDO::PARAM_STRING);
    $q->bindValue(':category', $news->getCategory(), PDO::PARAM_STRING);

    $q->execute();

    $q->hydrate([
        'id' => self::getDb()->lastInsertId(),
        'userId' => $user->getUserId(),
        'creationDate' => date()->format('d/m/Y H:i:s'),
        'updateDate' => ''
    ]);
  }

  protected function updateNews(News $news) {
    $q = $this->executeRequest('UPDATE news SET imageId = :imageId, content = :content, title = :title, category = :category WHERE id ='.$news->getId());
    $q->bindValue(':imageId', $news->getImageId(), PDO::PARAM_INT);
    $q->bindValue(':content', $news->getContent(), PDO::PARAM_INT);
    $q->bindValue(':title', $news->getTitle(), PDO::PARAM_INT);
    $q->bindValue(':category', $news->getCategory(), PDO::PARAM_INT);

    $q->execute();

    $q->hydrate([
        'updateDate' => date()->format('d/m/Y H:i:s')
    ]);
  }

  public function deleteNews(integer $id) {
    $this->executeRequest('DELETE FROM news WHERE id = '.(int) $id);
  }
}