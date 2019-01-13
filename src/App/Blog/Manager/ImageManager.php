<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\Image;
use API\App\Blog\Repository\AddImageRepository;
use API\App\Blog\Repository\UpdateImageRepository;
use API\App\Blog\Repository\DeleteImageRepository;

class ImageManager extends Db {
    
    public function addImage(string $url, string $name) {
        $repo = new AddImageRepository();

        $repo->addImage($url, $name);
    }

    public function updateImage(string $url, string $name, int $imageId) {
        $repo = new UpdateImageRepository();

        $repo->updateImage($url, $name, $imageId);
    }

    public function deleteImage(int $imageId) {
        $repo = new DeleteImageRepository();

        $repo->deleteImage($imageId);
    }
}