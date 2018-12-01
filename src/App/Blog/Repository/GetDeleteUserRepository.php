<?php

namespace API\App\Blog\Repository;

use API\Lib\Blog\Model\Db;

class GetDeleteUserRepository extends Db {
    public function getDeleteUser($newsId) {
        $sql = ('DELETE FROM user WHERE id = '.$userId);

        return $this->executeRequest($sql,array($userId));
    }
}