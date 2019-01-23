<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\Image;
use API\App\Blog\Repository\ImageRepository;
use API\App\Blog\Factory\GetImageDTOFactory;


class ImageManager extends Db {
    
    public function getImage(array $name) {
        $repo = new ImageRepository();
        $factory = new GetImageDTOFactory();

        $image = $factory->createFromRepository($repo->getImage($name));

        return $image;
    }

    public function addImage(string $url, string $name) {
        $repo = new ImageRepository();

        $repo->addImage($url, $name);
    }

    public function updateImage(string $url, string $name, int $imageId) {
        $repo = new ImageRepository();

        $repo->updateImage($url, $name, $imageId);
    }

    public function deleteImage(int $imageId) {
        $repo = new ImageRepository();

        $repo->deleteImage($imageId);
    }
}