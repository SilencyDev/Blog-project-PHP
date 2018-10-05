<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;

class CommentManager extends Db {

  public function countComment() {
    return $this->executeRequest('SELECT COUNT(*) FROM comment')->fetchColumn();
  }

  protected function addComment(Comment $newsId, $userId, $content) {
    $q = $this->executeRequest('INSERT INTO comment(newsId, userId, content) VALUES(:newsId, :userId, :content)');
    $q->bindValue(':content', $comment->getContent(), PDO::PARAM_STRING);

    $q->execute();

    $q->hydrate([
        'id' => $this->getDb->lastInsertId(),
        'creationDate' => date()->format('d/m/Y H:i:s'),
        'updateDate' => '',
        'validated' => '0'
    ]);
  }

  public function updateComment(Comment $comment) {
    $q = $this->executeRequest('UPDATE comment SET content = :content, validated = :validated WHERE id ='.$comment->id());
    $q->bindValue(':content', $comment->getContent(), PDO::PARAM_STRING);
    $q->bindvalue(':validated', $comment->getValidated(), PDO::PARAM_BOOLEAN);

    $q->execute();

    $q->hydrate([
        'updateDate' => date()->format('d/m/Y H:i:s')
    ]);
  }
  
  public function getComment(integer $id) {
    $q = $this->executeRequest('SELECT id, news, userId, content FROM comment WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'API\App\Blog\Entity\Comment');
    
    return $q->fetch();
  }

  public function getValidatedComment($newsId) {
    $sql = 'SELECT id, newsId, userId, content, creationDate FROM comment WHERE newsId = (?) and validated = 1';
    $newsId = (int) $newsId;
    $comments = $this->executeRequest($sql, array($newsId));

    return $comments;
  }

  public function deleteComment(integer $id) {
    $this->executeRequest('DELETE FROM comments WHERE id = '.$id);
  }

  public function deleteCommentsFromNews(integer $newsId) {
    $this->executeRequest('DELETE FROM comments WHERE news = '.$newsId);
  }

  public function getCommentsFromNews(integer $news) {
    $q = $this->executeRequest('SELECT id, newsId, userId, content, date FROM comment WHERE newsId = :newsId');
    $q->bindValue(':newsId', $news, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'API\App\Blog\Entity\Comment');
    
    $comments = $q->fetchAll();
    
    foreach ($comments as $comment) {
      $comment->setCreationDate(new \DateTime($comment->getCreationDate()));
    }
    
    return $comments;
  }
}