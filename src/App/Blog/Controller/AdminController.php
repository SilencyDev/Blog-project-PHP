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
        if(isset($content, $title, $category)) {
            $content = $this->request->getParams("content");
            $title = $this->request->getParams("title");
            $category = $this->request->getParams("category");

            $this->news->UpdateNews($content, $title, $category);
            $this->redirect('Admin');
        }
        else {
            $this->redirect('Admin','updateNewsPage');
        }
    }

    public function deleteNews() {
        $newsId = $this->request->getParams("id");

        $this->news->deleteNews($newsId);
    }

    Public function validComment() {

    }

    public function deleteComment() {
        $commentId = $this->request->getParams("id"); 

        $this->news->deleteComment($commentId);
    }

    public function updateProfile() {

    }
}