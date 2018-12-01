<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\News;
use API\App\Blog\Repository\GetANewsRepository;
use API\App\Blog\Factory\GetANewsDTOFactory;
use API\App\Blog\Repository\GetNewsRepository;
use API\App\Blog\Factory\GetNewsDTOFactory;
use API\App\Blog\Repository\GetUpdateNewsRepository;
use API\App\Blog\Repository\GetDeleteNewsRepository;
use API\App\Blog\Repository\GetAddNewsRepository;
use API\App\Blog\Repository\GetCountNewsRepository;

class NewsManager extends Db {

  public function countNews() {
    $repo = new GetCountNewsRepository();

    $count = $repo->getCountNews();

    return $countNews;
  }

  public function getNews() {
    $repo = new GetNewsRepository();
    $factory = new GetNewsDTOFactory();

    $news = $factory->createFromRepository($repo->getNews());
    
    return $news;
  }

  public function getUniqueNews(int $newsId) {
    $repo = new GetANewsRepository();
    $factory = new GetANewsDTOFactory();
    
    $aNews = $factory->createFromRepository($repo->getANews($newsId));
    
    return $aNews;
  }

  public function addNews(string $title, string $content, int $userId) {
    $repo = new GetAddNewsRepository();

    $repo->getAddNews($title, $content, $userId);
  }

  public function updateNews(string $content, string $title, int $newsId) {
    $repo = new GetUpdateNewsRepository();

    $repo->getUpdateNews($content, $title, $newsId);
  }

  public function deleteNews(int $newsId) {
    $repo = new GetDeleteNewsRepository();

    $repo->getDeleteNews($newsId);
  }
}