<?php

namespace API\App\Blog\Factory;

use API\App\Blog\Factory\DTOInterface;
use API\App\Blog\DTO\GetImageDTO;

class GetImageDTOFactory implements DTOFactoryInterface {
    public function createFromRepository(array $data) {
        $array = [];
        foreach($data as $aData) {
            $dto = new GetImageDTO();

            $dto->setId($aData["id"]);
            $dto->setName($aData["name"]);
            $dto->setUrl($aData["url"]);
            $dto->setLink($aData["link"]);

            $array[] = $dto;
        }
        return $array;
    }
}