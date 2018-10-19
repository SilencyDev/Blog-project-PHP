<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;

class CommentManager extends Db {

  public function countComment() {
    $sql = ('SELECT COUNT(*) FROM comment');

    $comments = $this->executeRequest($sql)->fetchColumn();

    return $comments;
  }

  protected function addComment($newsId, $userId, $content) {
    $q = $this->executeRequest('INSERT INTO comment(newsId, userId, content) VALUES(:newsId, :userId, :content)');
    $q->bindValue(':content', $comment->getContent(), PDO::PARAM_STRING);

    $q->execute();

    $q->hydrate([
        'id' => self::$db->lastInsertId(),
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

  public function deleteComment($commentId) {
    $sql = ('DELETE FROM comment WHERE id = '.(int) $commentId);
    $q = $this->executeRequest($sql,array($commentId));

    return $q;
  }

  public function deleteCommentsFromNews($newsId) {
    $sql = ('DELETE FROM comment WHERE newsId = '.(int) $newsId);
    $q = $this->executeRequest($sql,array($newsId));

    return $q;
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