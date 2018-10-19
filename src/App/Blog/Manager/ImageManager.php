<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;

class ImageManager extends Db {
    
    public function addImage($url, $name) {
        $sql = ('INSERT INTO image(url, name) VALUES(?, ?)');
        $url = (string) $url;
        $name = (string) $name;

        $image = $this->executeRequest($sql,array($url, $name));

        $image->hydrate([
            'id' => self::$db->lastInsertId()
        ]);
    }

    public function updateImage(Image $image) {
        $q = $this->executeRequest('UPDATE image SET url = :url, name = :name WHERE imageId ='.$image->imageId());
        $q->bindValue(':url', $image->url, PDO::PARAM_STRING);
        $q->bindValue(':name', $image->name, PDO::PARAM_STRING);

        $q->execute();
    }

    public function deleteImage($id) {
        $sql = ('DELETE FROM image WHERE id = '.(int) $id);
        $q = $this->executeRequest($sql,array($id));

        return $q;
    }
}