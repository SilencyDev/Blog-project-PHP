<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\Comment;
use API\App\Blog\Entity\User;
use API\App\Blog\Factory\GetCommentDTOFactory;
use API\App\Blog\Repository\CommentRepository;
use API\App\Blog\Repository\GetCountCommentRepository;

class CommentManager extends Db
{
    public function getValidatedComment(int $newsId)
    {
        $repo = new CommentRepository();
        $factory = new GetCommentDTOFactory();
    
        return $factory->createFromRepository($repo->getValidatedComment($newsId));
    }
  
    public function getUnvalidatedComment()
    {
        $repo = new CommentRepository();
        $factory = new GetCommentDTOFactory();

        return $factory->createFromRepository($repo->getUnvalidatedComment());
    }

    public function addComment(int $newsId, int $userId, string $content)
    {
        $repo = new CommentRepository();

        $repo->addComment($newsId, $userId, $content);
    }

    public function deleteComment(int $commentId)
    {
        $repo = new CommentRepository();

        $repo->deleteComment($commentId);
    }

    public function deleteCommentsFromNews(int $newsId)
    {
        $repo = new CommentRepository();

        $repo->deleteCommentFromNews($newsId);
    }

    public function validComment(int $commentId)
    {
        $repo = new CommentRepository();

        $repo->validComment($commentId);
    }

    public function countComment()
    {
        $repo = new GetCountCommentRepository();

        $countComment = $repo->getCountComment();

        return $countComment;
    }
}
