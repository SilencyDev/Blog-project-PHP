<?php

namespace API\App\Blog\Controller;

use API\App\Blog\Controller\IsAdminController;
use API\App\Blog\Entity\News;
use API\App\Blog\Entity\Comment;
use API\App\Blog\Entity\Image;
use API\App\Blog\Entity\User;

class AdminController extends IsAdminController {

    public function __construct() {

        $this->news = new News();
        $this->comment = new Comment();
        $this->image = new Image();
        $this->user = new User();
    }

    public function index() {
        $this->createView();
    }

    public function addNewsPage() {
        $this->createView();
    }

    public function addNews() {
            $content = $this->request->getParams("content");
            $title = $this->request->getParams("title");

            $this->news->addNews($content, $title, $this->request);
            $this->redirect('News');
    }

    public function updateNewsPage() {
        $this->createView();
    }

    public function updateNews() {
            $content = $this->request->getParams("content");
            $title = $this->request->getParams("title");
            $newsId = $this->request->getParams("newsId");

            $this->news->UpdateNews($content, $title, $newsId);
            $this->redirect('News/aNews/'.$newsId);
    }

    public function deleteNews() {
        $newsId = $this->request->getParams("newsId");

        $this->comment->deleteCommentsFromNews($newsId);
        $this->news->deleteNews($newsId);
        $this->redirect('News');
    }

    Public function validCommentPage() {
        $comments = $this->comment->getUnvalidatedComment();
        $this->createView(array('comments' => $comments));
    }

    Public function validComment() {
        if($this->request->existParams("validated") && $this->request->getParams("validated")) {
            $commentId = $this->request->getParams("commentId");
            $this->comment->ValidComment($commentId);
        }

        $this->redirect('Admin/validCommentPage');
    }

    public function deleteComment() {
        $commentId = $this->request->getParams("commentId"); 
        $newsId = $this->request->getParams("newsId");

        $this->comment->deleteComment($commentId);
        $this->redirect('News/anews/'.$newsId );
    }
}