<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\News;
use API\App\Blog\Factory\GetNewsDTOFactory;
use API\App\Blog\Repository\NewsRepository;
use API\App\Blog\Repository\GetCountNewsRepository;
use API\Lib\Blog\Config\Configuration;

class NewsManager extends Db
{
    public function getNews($request)
    {
        $repo = new NewsRepository();
        $factory = new GetNewsDTOFactory();
        $newsPerPage = Configuration::get("newsPerPage");

        $pageNumber = $request->existParams('page') ? $request->getParams('page') : null;
        $page = isset($pageNumber) ? (int) $pageNumber : 1;
        $start = ($page > 1) ? ($page * $newsPerPage) - $newsPerPage : 0;

        $news = $factory->createFromRepository($repo->getNews($newsPerPage, $start));

        return $news;
    }

    public function getANews(int $newsId)
    {
        $repo = new NewsRepository();
        $factory = new GetNewsDTOFactory();
    
        $aNews = $factory->createFromRepository($repo->getANews($newsId));
    
        return $aNews;
    }

    public function addNews(string $title, string $content, int $userId)
    {
        $repo = new NewsRepository();

        $repo->addNews($title, $content, $userId);
    }

    public function updateNews(string $content, string $title, int $newsId)
    {
        $repo = new NewsRepository();

        $repo->updateNews($content, $title, $newsId);
    }

    public function deleteNews(int $newsId)
    {
        $repo = new NewsRepository();

        $repo->deleteNews($newsId);
    }

    public function countNews()
    {
        $repo = new NewsRepository();

        $countNews = $repo->countNews();

        return $countNews;
    }
}
