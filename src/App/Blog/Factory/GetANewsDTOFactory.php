<?php

namespace API\App\Blog\Factory;

use API\App\Blog\Factory\DTOInterface;
use API\App\Blog\DTO\GetANewsDTO;

class GetANewsDTOFactory implements DTOFactoryInterface {
    public function createFromRepository(array $data) {
        $array = [];
        foreach($data as $aData) {
            $dto = new GetANewsDTO();

            $dto->setId($aData["id"]);
            $dto->setUserId($aData["userId"]);
            $dto->setContent($aData["content"]);
            $dto->setTitle($aData["title"]);
	        $dto->setCreationDate($aData["creationDate"]);
	        $dto->setUpdateDate($aData["updateDate"]);
            $dto->setCategory($aData["category"]);

            $array[] = $dto;
        }
        return $array;
    }
}