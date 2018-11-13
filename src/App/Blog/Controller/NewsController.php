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

    public function addComment() {
        if($this->request->getSession()->existAttribut("id")) {
            $content = $this->request->getParams("content");
            $newsId =  $this->request->getParams("newsId");
            $this->comment->addComment($content, $newsId, $this->request);

            $this->redirect("News/aNews/".$newsId);
        }
        else {
            $this->redirect("connect");
        }
    }
}