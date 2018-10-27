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

    public function updateNews() {
            $content = $this->request->getParams("content");
            $title = $this->request->getParams("title");

            $this->news->UpdateNews($content, $title, $this->request);
            $this->redirect('Admin');
    }

    public function deleteNews() {
        $newsId = $this->request->getParams("newsId");

        $this->comment->deleteCommentsFromNews($newsId);
        $this->news->deleteNews($newsId);
        $this->redirect('News');
    }

    Public function validCommentPage() {
        $this->createView();
    }

    Public function validComment() {
        
    }

    public function deleteComment() {
        $commentId = $this->request->getParams("commentId"); 
        $newsId = $this->request->getParams("newsId");

        $this->comment->deleteComment($commentId);
        $this->redirect('News/anews/'.$newsId );
    }

    public function updateProfile() {

    }

    public function updateProfilePage() {
        $this->createview();
    }
}