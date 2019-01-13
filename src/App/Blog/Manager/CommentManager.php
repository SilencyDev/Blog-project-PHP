<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\Comment;
use API\App\Blog\Entity\User;
use API\App\Blog\Repository\GetValidatedCommentRepository;
use API\App\Blog\Factory\GetCommentDTOFactory;
use API\App\Blog\Repository\UpdateCommentRepository;
use API\App\Blog\Repository\AddCommentRepository;
use API\App\Blog\Repository\GetCountCommentRepository;
use API\App\Blog\Repository\DeleteCommentRepository;
use API\App\Blog\Repository\DeleteCommentFromNewsRepository;
use API\App\Blog\Repository\GetValidCommentRepository;
use API\App\Blog\Repository\GetUnvalidatedCommentRepository;

class CommentManager extends Db {

  public function countComment() {
    $repo = new GetCountCommentRepository();

    $countComment = $repo->getCountComment();

    return $countComment;
  }

  public function addComment(int $newsId, int $userId, string $content) {
    $repo = new AddCommentRepository();

    $repo->addComment($newsId, $userId, $content);
  }

  public function getValidatedComment(int $newsId) {
    $repo = new GetValidatedCommentRepository();
    $factory = new GetCommentDTOFactory();
    
    return $factory->createFromRepository($repo->getValidatedComment($newsId));
  }

  public function getUnvalidatedComment() {
    $repo = new GetUnvalidatedCommentRepository();
    $factory = new GetCommentDTOFactory();

    return $factory->createFromRepository($repo->getUnvalidatedComment());
  }

  public function validComment(int $commentId) {
    $repo = new GetValidCommentRepository();

    $repo->getValidComment($commentId);
  }

  public function deleteComment(int $commentId) {
    $repo = new DeleteCommentRepository();

    $repo->deleteComment($commentId);
  }

  public function deleteCommentsFromNews(int $newsId) {
    $repo = new DeleteCommentFromNewsRepository();

    $repo->deleteCommentFromNews($newsId);
  }
}