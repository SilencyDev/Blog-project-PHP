<?php

namespace API\App\Blog\Factory;

use API\App\Blog\Factory\DTOInterface;
use API\App\Blog\DTO\GetCommentDTO;

class GetCommentDTOFactory implements DTOFactoryInterface {
    public function createFromRepository(array $data) {
        $array = [];
        foreach($data as $aData) {
            $dto = new GetCommentDTO();

            $dto->setId($aData["id"]);
            $dto->setUserId($aData["userId"]);
            $dto->setPseudo($aData["pseudo"]);
            $dto->setCreationDate($aData["creationDate"]);
            $dto->setContent($aData["content"]);
            $dto->setNewsId($aData["newsId"]);
            
            $array[] = $dto;
        }

        return $array;
    }
}