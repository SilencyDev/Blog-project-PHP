<?php

namespace API\App\Blog\Controller;

use API\Lib\Blog\Controller\SecureController;
use API\App\Blog\Entity\News;
use API\App\Blog\Entity\Comment;
use API\App\Blog\Entity\Image;
use API\App\Blog\Entity\User;

class AdminController extends SecureController {

    public function index() {
        $this->createView;
    }

    public function addNews() {

    }
}