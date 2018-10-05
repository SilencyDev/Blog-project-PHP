<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;

class ImageManager extends Db {
    
    public function addImage(Image $image) {
        $q = $this->executeRequest('INSERT INTO image(imageUrl, name) VALUES(:imageUrl, :name)');
        $q->bindValue(':imageUrl', $image->imageUrl, PDO::PARAM_STRING);
        $q->bindValue('name', $image->name, PDO::PARAM_STRING);

        $q->execute();

        $q->hydrate([
            'imageId' => $this->db->lastInsertimageId()
        ]);
    }

    public function updateImage(Image $image) {
        $q = $this->executeRequest('UPDATE image SET imageUrl = :imageUrl, name = :name WHERE imageId ='.$image->imageId());
        $q->bindValue(':imageUrl', $image->imageUrl, PDO::PARAM_STRING);
        $q->bindValue(':name', $image->name, PDO::PARAM_STRING);

        $q->execute();
    }

    public function deleteImage(Image $image) {
        $this->executeRequest('DELETE from image WHERE imageId ='.$image->imageId());
    }
}