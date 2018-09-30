<?php

namespace API\App\Blog\Model;

use \Lib\Blog\Model\Db;

class ImageManager {
    
    public function addImage(Image $image) {
        $q = $this->getDb->prepare('INSERT INTO image(imageUrl, name) VALUES(:imageUrl, :name)');
        $q->bindValue(':imageUrl', $image->imageUrl, PDO::PARAM_STRING);
        $q->bindValue('name', $image->name, PDO::PARAM_STRING);

        $q->execute();

        $q->hydrate([
            'id' => $this->db->lastInsertId()
        ]);
    }

    public function updateImage(Image $image) {
        $q->getDb->prepare('UPDATE image SET imageUrl = :imageUrl, name = :name WHERE id ='.$image->id());
        $q->bindValue(':imageUrl', $image->imageUrl, PDO::PARAM_STRING);
        $q->bindValue(':name', $image->name, PDO::PARAM_STRING);

        $q->execute();
    }

    public function deleteImage(Image $image) {
        $this->getDb->exec('DELETE from image WHERE id ='.$image->id());
    }
}