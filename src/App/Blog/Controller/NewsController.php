<?php

namespace API\App\Blog\Controller;

use API\Lib\Blog\Controller\Controller;
use API\Lib\Blog\Config\Configuration;
use API\App\Blog\Manager\CommentManager;
use API\App\Blog\Manager\NewsManager;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->newsManager = new NewsManager();
        $this->commentManager = new CommentManager();
    }

    public function index()
    {
        $news = $this->newsManager->getNews($this->request);
        $countNews = $this->newsManager->countNews();
        $newsPerPage = Configuration::get("newsPerPage");
        $nbPage = ceil($countNews/$newsPerPage);
        
        $this->createView(array('news' => $news,'countNews' => $countNews, 'newsPerPage' => $newsPerPage, 'nbPage' =>$nbPage));
    }

    public function aNews()
    {
        $newsId = $this->request->getParams("id");

        $news = $this->newsManager->getANews($newsId)[0];
        $comments = $this->commentManager->getValidatedComment($newsId);

        $this->createView(array('news' => $news, 'comments' => $comments));
    }

    public function addComment()
    {
        if ($this->request->getSession()->existAttribut("id")) {
            $content = $this->request->getParams("content");
            $newsId = $this->request->getParams("newsId");
            $userId = $this->request->getSession()->getAttribut("id");
            $this->commentManager->addComment($newsId, $userId, $content);

            $this->redirect("News/aNews/".$newsId);
            return;
        }
        $this->redirect("connect");
        return;
    }
}
