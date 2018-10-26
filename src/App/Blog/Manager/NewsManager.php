<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;

class NewsManager extends Db {

  public function countNews() {
    $sql = 'SELECT count(*) FROM news';

    $countNews = $this->executeRequest($sql)->fetchColumn();

    return $countNews;
  }

  public function getNews() {
    $sql = 'SELECT id, userId, title, content, creationDate, updateDate, category FROM news ORDER BY id DESC';
    
    $news = $this->executeRequest($sql);

    return $news;
  }

  public function getUniqueNews($newsId) {
    $sql = "SELECT id, userId, title, content, creationDate, updateDate, category FROM news WHERE id = ?";
    $newsId = (int) $newsId;

    $aNews = $this->executeRequest($sql,array($newsId));
    if ($aNews->rowcount() > 0) {
      return $aNews->fetch();
    }
    else {
      throw new \Exception("There is no news relative to '$newsId' ID");
    }
  }

  public function addNews($title, $content, $request) {
    $sql = ('INSERT INTO news(title, content, userId, creationDate) VALUES(?, ?, ?, ?)');
    $title = (string) $title;
    $content = (string) $content;

    $news = $this->executeRequest($sql,array($title, $content, $request->getSession()->getAttribut("id"), date("Y/m/d H:i:s")));

  }

  protected function updateNews($content, $title, $request) {
    $sql = 'UPDATE news SET content = ?, title = ?, updateDate = ? WHERE id = ?';
    $content = (string) $content;
    $title = (string) $title;

    $news = $this->executeRequest($sql,array($content, $title, date("Y/m/d H:i:s"), $request->getParams('newsId')));
  }

  public function deleteNews($request) {
    $sql = 'DELETE FROM news WHERE id = ?';
    $q = $this->executeRequest($sql,array($request->getParams('newsId')));
  }
}