<?php

namespace API\App\Blog\Model;

class CommentManager
{
  public function countComment() {
    return $this->getDb->query('SELECT COUNT(*) FROM comments')->fetchColumn();
  }

  protected function addComment(Comment $newsId, $author, $content) {
    $q = $this->getDb->prepare('INSERT INTO comments(newsId, author, content) VALUES(:newsId, :author, :content)');
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
    $q->getDb->prepare('UPDATE comments SET content = :content, validated = :validated WHERE id ='.$comment->id());
    $q->bindValue(':content', $comment->getContent(), PDO::PARAM_STRING);
    $q->bindvalue(':validated', $comment->getValidated(), PDO::PARAM_BOOLEAN);

    $q->execute();

    $q->hydrate([
        'updateDate' => date()->format('d/m/Y H:i:s')
    ]);
  }
  
  public function getComment(integer $id) {
    $q = $this->getDb->prepare('SELECT id, news, author, content FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\App\Blog\Entity\Comment');
    
    return $q->fetch();
  }

  public function getValidatedComment(integer $id) {
    $q = $this->getDb->prepare('SELECT id, news, author, content FROM comments WHERE id = :id AND validated = 1');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\App\Blog\Entity\Comment');
    
    return $q->fetch();
  }

  public function deleteComment(integer $id) {
    $this->getDb->exec('DELETE FROM comments WHERE id = '.$id);
  }

  public function deleteCommentsFromNews(integer $newsId) {
    $this->getDb->exec('DELETE FROM comments WHERE news = '.$newsId);
  }

  public function getCommentsFromNews(integer $news) {
    $q = $this->getDb->prepare('SELECT id, articleId, author, content, date FROM comments WHERE articleId = :articleId');
    $q->bindValue(':articleId', $news, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\App\Blog\Entity\Comment');
    
    $comments = $q->fetchAll();
    
    foreach ($comments as $comment) {
      $comment->setCreationDate(new \DateTime($comment->getCreationDate()));
    }
    
    return $comments;
  }
}