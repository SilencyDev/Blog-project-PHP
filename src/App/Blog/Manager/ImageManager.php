<?php

namespace API\App\Blog\Manager;

use API\Lib\Blog\Model\Db;

class ImageManager extends Db {
    
    public function addImage($url, $name) {
        $sql = 'INSERT INTO image(url, name) VALUES(?, ?)';
        $url = (string) $url;
        $name = (string) $name;

        $q = $this->executeRequest($sql,array($url, $name));
    }

    public function updateImage($url, $name, $request) {
        $sql = 'UPDATE image SET url = ?, name = ? WHERE imageId =?';

        $q = $this->executeRequest($sql,array($url, $name, $request->getParams("imageId")));
    }

    public function deleteImage($request) {
        $sql = 'DELETE FROM image WHERE id = ?';
        
        $q = $this->executeRequest($sql,array($request->getParams("imageId")));
    }
}