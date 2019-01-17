<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;
use API\App\Blog\Entity\Image;
use API\App\Blog\Repository\AddImageRepository;
use API\App\Blog\Repository\UpdateImageRepository;
use API\App\Blog\Repository\DeleteImageRepository;
use API\App\Blog\Repository\GetImageRepository;
use API\App\Blog\Factory\GetImageDTOFactory;


class ImageManager extends Db {
    
    public function getImage(string $name) {
        $repo = new GetImageRepository();
        $factory = new GetImageDTOFactory();

        $image = $factory->createFromRepository($repo->getImage($name));

        return $image;
    }

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