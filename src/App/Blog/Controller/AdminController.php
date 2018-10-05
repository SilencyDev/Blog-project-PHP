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
        $this->createView;
    }

    public function addNews() {

    }

    public function updateNews() {

    }

    public function deleteNews() {

    }

    Public function validComment() {

    }

    public function deleteComment() {

    }

    public function updateProfile() {

    }

}