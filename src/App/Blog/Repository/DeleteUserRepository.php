<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class DeleteUserRepository extends Db implements RepositoryInterface {
    public function deleteUser($newsId) {
        $sql = ('DELETE FROM user WHERE id = '.$userId);

        return $this->executeRequest($sql,array($userId));
    }
}