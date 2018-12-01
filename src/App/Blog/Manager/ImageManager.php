<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\Image;
use API\App\Blog\Repository\GetAddImageRepository;
use API\App\Blog\Repository\GetUpdateImageRepository;
use API\App\Blog\Repository\GetDeleteImageRepository;

class ImageManager extends Db {
    
    public function addImage(string $url, string $name) {
        $repo = new GetAddImageRepository();

        $repo->getAddImage($url, $name);
    }

    public function updateImage(string $url, string $name, int $imageId) {
        $repo = new GetUpdateImageRepository();

        $repo->getUpdateImage($url, $name, $imageId);
    }

    public function deleteImage(int $imageId) {
        $repo = new GetDeleteImageRepository();

        $repo->getDeleteImage($imageId);
    }
}