<?php

namespace API\App\Blog\Factory;

interface DTOFactoryInterface
{
    public function createFromRepository(array $data);
}
