<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class CommentRepository extends Db implements RepositoryInterface
{
    public function getUnvalidatedComment()
    {
        $sql = 'SELECT comment.id, newsId, userId, content, creationDate, pseudo, validated FROM comment LEFT JOIN user ON comment.userId = user.id WHERE validated = 0 ORDER BY id ASC';
        
        return $this->executeRequest($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function addComment($newsId, $userId, $content)
    {
        $sql = 'INSERT INTO comment(newsId, userId, content, creationDate) VALUES(?, ?, ?, ?)';
        $this->executeRequest($sql, array($newsId, $userId, $content, date("Y/m/d H:i:s")));
    }

    public function deleteCommentFromNews($newsId)
    {
        $sql = 'DELETE FROM comment WHERE newsId = ?';
        $this->executeRequest($sql, array($newsId));
    }

    public function deleteComment($commentId)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->executeRequest($sql, array($commentId));
    }

    public function getValidatedComment($newsId)
    {
        $sql = 'SELECT comment.id, newsId, userId, content, creationDate, pseudo FROM comment LEFT JOIN user ON comment.userId = user.id WHERE newsId = ? and validated = 1 ORDER BY id DESC';
        
        return $this->executeRequest($sql, array($newsId))->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function validComment($commentId)
    {
        $sql = 'UPDATE comment SET validated = 1 WHERE id = ?';
    
        $this->executeRequest($sql, array($commentId));
    }

    public function countAllComment()
    {
        $sql = 'SELECT count(*) FROM comment';

        $countComment = $this->executeRequest($sql)->fetchColumn();
    
        return $countComment;
    }
}
