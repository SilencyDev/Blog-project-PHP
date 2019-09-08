<?php

namespace API\App\Blog\Factory;

use API\App\Blog\Factory\DTOInterface;
use API\App\Blog\DTO\GetUserDTO;

class GetUserDTOFactory implements DTOFactoryInterface
{
    public function createFromRepository(array $data)
    {
        foreach ($data as $aData) {
            $dto = new GetUserDTO();

            $dto->setId($aData["id"]);
            $dto->setFirstName($aData["firstName"]);
            $dto->setLastName($aData["lastName"]);
            $dto->setPseudo($aData["pseudo"]);
            $dto->setPassword($aData["password"]);
            $dto->setEmail($aData["email"]);
            $dto->setDateOfBirth($aData["dateOfBirth"]);
            $dto->setAdministrator($aData["administrator"]);
            $dto->setProfileDate($aData["profileDate"]);

            $array[] = $dto;
        }
        return $array;
    }
}
