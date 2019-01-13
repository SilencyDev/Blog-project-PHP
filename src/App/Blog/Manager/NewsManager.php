<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\News;
use API\App\Blog\Repository\GetANewsRepository;
use API\App\Blog\Repository\GetNewsRepository;
use API\App\Blog\Factory\GetNewsDTOFactory;
use API\App\Blog\Repository\UpdateNewsRepository;
use API\App\Blog\Repository\DeleteNewsRepository;
use API\App\Blog\Repository\AddNewsRepository;
use API\App\Blog\Repository\GetCountNewsRepository;
use API\Lib\Blog\Config\Configuration;

class NewsManager extends Db {

  public function countNews() {
    $repo = new GetCountNewsRepository();

    $count = $repo->getCountNews();

    return $countNews;
  }

  public function getNews($request) {
    $repo = new GetNewsRepository();
    $factory = new GetNewsDTOFactory();

    $q = $request->existParams('page');
    $page = isset($q) ? (int) $q : 1;
    $newsPerPage = Configuration::get("newsPerPage");
    $start = ($page > 1) ? ($page * $newsPerPage) - $newsPerPage : 0;

    $news = $factory->createFromRepository($repo->getNews($page, $newsPerPage, $start));
    
    return $news;
  }

  public function getUniqueNews(int $newsId) {
    $repo = new GetANewsRepository();
    $factory = new GetNewsDTOFactory();
    
    $aNews = $factory->createFromRepository($repo->getANews($newsId));
    
    return $aNews;
  }

  public function addNews(string $title, string $content, int $userId) {
    $repo = new AddNewsRepository();

    $repo->addNews($title, $content, $userId);
  }

  public function updateNews(string $content, string $title, int $newsId) {
    $repo = new UpdateNewsRepository();

    $repo->updateNews($content, $title, $newsId);
  }

  public function deleteNews(int $newsId) {
    $repo = new DeleteNewsRepository();

    $repo->deleteNews($newsId);
  }
}