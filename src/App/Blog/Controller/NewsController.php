<?php

namespace API\App\Blog\Controller;

use API\Lib\Blog\Controller\Controller;
use API\App\Blog\Entity\Comment;
use API\App\Blog\Entity\News;

class NewsController extends Controller {

    private $news;
    private $comment;

    public function __construct() {
        $this->news = new News();
        $this->comment = new Comment();
    }

    Public function index() {
        $news = $this->news->getNews();
        $this->createView(array('news' => $news));
    }

    Public function aNews() {
        $newsId = $this->request->getParams("id");

        $aNews = $this->news->getUniqueNews($newsId);
        $comments = $this->comment->getValidatedComment($newsId);

        $this->createView(array('aNews' => $aNews, 'comments' => $comments));
    }

    public function comment() {
        if($this->request->getSession()->existAttribut("userId")) {
            $newsId = $this->request->getParams("id");
            $userId = $this->request->getParams("userId");
            $content = $this->request->getParams("content");

            $this->comment->addComment($newsId, $userId, $content);

            $this->executeAction("index");
        }
        else {
            $this->redirect("connexion");
        }
    }
}