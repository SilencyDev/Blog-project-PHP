<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetImageRepository extends Db implements RepositoryInterface {
    public function getImage($name) {
        $sql = "SELECT id, name, url, link FROM image WHERE name = ?";

        $image = $this->executeRequest($sql,array($name));

        if($image->rowcount() > 0) {
          return $image->fetchAll(\PDO::FETCH_ASSOC);
        }
        else {
          throw new \Exception("There is no image relative to '$name'");
        }
    }
}