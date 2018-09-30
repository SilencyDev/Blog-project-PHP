<?php

namespace API\App\Blog\Model;

class NewsManager {

  public function countNews() {
    return $this->getDb->query('SELECT COUNT(*) FROM news')->fetchColumn();
  }

  public function getNews() {
    $sql = 'SELECT id, userId, title, content, creationDate, updateDate, category, imageId FROM news ORDER BY id DESC';
    
    $q = $this->getDb->query($sql);
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Blog\Entity\News');
    
    $listNews = $q->fetchAll();
    
    foreach ($listNews as $news) {
      $news->setCreationDate(new \DateTime($news->getCreationDate()));
      $news->setUpdateDate(new \DateTime($news->getUpdateDate()));
    }
    
    $q->closeCursor();
    
    return $listeNews;
  }

  public function getUniqueNews(integer $id) {
    $q = $this->getDb->prepare('SELECT id, userId, title, content, creationDate, updateDate, category, imageId FROM news WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Blog\Entity\News');
    
    if ($news = $q->fetch()) {
      $news->setCreationDate(new \DateTime($news->getCreationDate()));
      $news->setUpdateDate(new \DateTime($news->getUpdateDate()));
      
      return $news;
    }
    
    return null;
  }

  protected function addNews(News $news) {
    $q = $this->getDb->prepare('INSERT INTO news(imageId, content, title, category) VALUES(:imageId, :content, :title, :category)');
    $q->bindValue(':imageId', $news->getImageId(), PDO::PARAM_INT);
    $q->bindValue(':content', $news->getContent(), PDO::PARAM_STRING);
    $q->bindValue(':title', $news->getTitle(), PDO::PARAM_STRING);
    $q->bindValue(':category', $news->getCategory(), PDO::PARAM_STRING);

    $q->execute();

    $q->hydrate([
        'id' => $this->getDb->lastInsertId(),
        'userId' => $user->getUserId(),
        'creationDate' => date()->format('d/m/Y H:i:s'),
        'updateDate' => ''
    ]);
  }

  protected function updateNews(News $news) {
    $q->getDb->prepare('UPDATE news SET imageId = :imageId, content = :content, title = :title, category = :category WHERE id ='.$news->id());
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
    $this->getDb->exec('DELETE FROM news WHERE id = '.(int) $id);
  }
}