<?php

namespace API\App\Blog\Controller;

use API\Lib\Blog\Controller\Controller;
use API\Lib\Blog\Config\Configuration;
use API\App\Blog\Manager\CommentManager;
use API\App\Blog\Manager\NewsManager;

class NewsController extends Controller {
    
    public function __construct() {
        $this->newsManager = new NewsManager();
        $this->commentManager = new CommentManager();
    }

    Public function index() {
        $news = $this->newsManager->getNews($this->request);
        $this->createView(array('news' => $news));
    }

    Public function aNews() {
        $newsId = $this->request->getParams("id");

        $aNews = $this->newsManager->getUniqueNews($newsId);
        $comments = $this->commentManager->getValidatedComment($newsId);

        $this->createView(array('aNews' => $aNews, 'comments' => $comments));
    }

    public function addComment() {
        if($this->request->getSession()->existAttribut("id")) {
            $content = $this->request->getParams("content");
            $newsId = $this->request->getParams("newsId");
            $userId = $this->request->getSession()->getAttribut("id");
            $this->commentManager->addComment($newsId, $userId, $content);

            $this->redirect("News/aNews/".$newsId);
        }
        else {
            $this->redirect("connect");
        }
    }
}