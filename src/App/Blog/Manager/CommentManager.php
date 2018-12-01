<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\Comment;
use API\App\Blog\Entity\User;
use API\App\Blog\Repository\GetValidatedCommentRepository;
use API\App\Blog\Factory\GetValidatedCommentDTOFactory;
use API\App\Blog\Repository\GetUpdateCommentRepository;
use API\App\Blog\Repository\GetAddCommentRepository;
use API\App\Blog\Repository\GetCountCommentRepository;
use API\App\Blog\Repository\GetDeleteCommentRepository;
use API\App\Blog\Repository\GetDeleteCommentFromNewsRepository;
use API\App\Blog\Repository\GetValidCommentRepository;
use API\App\Blog\Repository\GetUnvalidatedCommentRepository;
use API\App\Blog\Factory\GetUnvalidatedCommentDTOFactory;

class CommentManager extends Db {

  public function countComment() {
    $repo = new GetCountCommentRepository();

    $countComment = $repo->getCountComment();

    return $countComment;
  }

  public function addComment($newsId, $userId, $content) {
    $repo = new GetAddCommentRepository();

    $repo->getAddComment($newsId, $userId, $content);
  }

  public function updateComment($content, $request) {
    $repo = new GetUpdateCommentRepository();

    $repo->getUpdateComment($content, $request);
  }


  public function getValidatedComment(int $newsId) {
    $repo = new GetValidatedCommentRepository();
    $factory = new GetValidatedCommentDTOFactory();
    
    return $factory->createFromRepository($repo->getValidatedComment($newsId));
  }

  public function getUnvalidatedComment() {
    $repo = new GetUnvalidatedCommentRepository();
    $factory = new GetUnvalidatedCommentDTOFactory();

    return $factory->createFromRepository($repo->getUnvalidatedComment());
  }

  public function validComment(int $commentId) {
    $repo = new GetValidCommentRepository();

    $repo->getValidComment($commentId);
  }

  public function deleteComment(int $commentId) {
    $repo = new GetDeleteCommentRepository();

    $repo->getDeleteComment($commentId);
  }

  public function deleteCommentsFromNews(int $newsId) {
    $repo = new GetDeleteCommentFromNewsRepository();

    $repo->getDeleteCommentFromNews($newsId);
  }
}