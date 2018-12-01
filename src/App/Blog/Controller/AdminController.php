<?php

namespace API\App\Blog\Controller;

use API\App\Blog\Controller\IsAdminController;
use API\App\Blog\Manager\NewsManager;
use API\App\Blog\Manager\CommentManager;
use API\App\Blog\Manager\ImageManager;
use API\App\Blog\Manager\UserManager;

class AdminController extends IsAdminController {

    public function __construct() {

        $this->newsManager = new NewsManager();
        $this->commentManager = new CommentManager();
        $this->imageManager = new ImageManager();
        $this->userManager = new UserManager();
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
            $userId = $this->request->getSession()->getAttribut("id");

            $this->newsManager->addNews($content, $title, $userId);
            $this->redirect('News');
    }

    public function updateNewsPage() {
        $this->createView();
    }

    public function updateNews() {
            $content = $this->request->getParams("content");
            $title = $this->request->getParams("title");
            $newsId = $this->request->getParams("newsId");

            $this->newsManager->UpdateNews($content, $title, $newsId);
            $this->redirect('News/aNews/'.$newsId);
    }

    public function deleteNews() {
        $newsId = $this->request->getParams("newsId");

        $this->commentManager->deleteCommentsFromNews($newsId);
        $this->newsManager->deleteNews($newsId);
        $this->redirect('News');
    }

    Public function validCommentPage() {
        $comments = $this->commentManager->getUnvalidatedComment();
        $this->createView(array('comments' => $comments));
    }

    Public function validComment() {
        if($this->request->existParams("validated") && $this->request->getParams("validated")) {
            $commentId = $this->request->getParams("commentId");
            var_dump($commentId);
            $this->commentManager->ValidComment($commentId);
        }

        $this->redirect('Admin/validCommentPage');
    }

    public function deleteComment() {
        $commentId = $this->request->getParams("commentId");
        $newsId = $this->request->getParams("newsId");

        $this->commentManager->deleteComment($commentId);
        $this->redirect('News/anews/'.$newsId);
    }

    public function deleteCommentToValid() {
        $commentId = $this->request->getParams("commentId");
        $newsId = $this->request->getParams("newsId");

        $this->commentManager->deleteComment($commentId);
        $this->redirect('Admin/validCommentPage/'); 
    }
}