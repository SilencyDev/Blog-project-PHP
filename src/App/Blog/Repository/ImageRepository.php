<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class ImageRepository extends Db implements RepositoryInterface {
    
    public function getImage(array $name) {
        $sql = "SELECT id, name, url, link FROM image WHERE name IN [?]";

        $image = $this->executeRequest($sql,array($name));

        if($image->rowcount() > 0) {
          return $image->fetch(\PDO::FETCH_ASSOC);
        }
        else {
          throw new \Exception("There is no image relative to '$name'");
        }
    }

    public function addImage($url, $name) {
        $sql = 'INSERT INTO image(url, name) VALUES(?, ?)';

        $q = $this->executeRequest($sql,array($url, $name));
    }

    public function updateImage($url, $name, $imageId) {
        $sql = 'UPDATE image SET url = ?, name = ? WHERE imageId =?';

        $q = $this->executeRequest($sql,array($url, $name, $imageId));
    }
    
    public function deleteImage($imageId) {
        $sql = 'DELETE FROM image WHERE id = ?';

        $q = $this->executeRequest($sql,array($imageId));
    }
}