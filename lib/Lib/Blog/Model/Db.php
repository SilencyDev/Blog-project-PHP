<?php

namespace API\Lib\Blog\Model;

use API\Lib\Blog\Config\Configuration;

/**
 * All services relative to the database
 * Using PDO API
 */

 abstract class Db
 {
     private static $db;

     protected function executeRequest($sql, $params = null)
     {
         if ($params == null) {
             $result = self::getDb()->query($sql); // direct request
             return $result;
         }
         $result = self::getDb()->prepare($sql); // prepared request
         $result->execute($params);
         return $result;
     }

     private static function getDb()
     {
         if (self::$db === null) {
             // Getting credentials for database connexion
             $dsn = Configuration::get("dsn");
             $login = Configuration::get('login');
             $password = Configuration::get('password');
             // Starting connexion
             self::$db = new \PDO(
                 $dsn,
                 $login,
                 $password,
                 array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)
             );
         }
         return self::$db;
     }

     public function hydrate(array $data)
     {
         foreach ($data as $key => $value) {
             $method = 'set'.ucfirst($key);
        
             if (method_exists($this, $method)) {
                 $this->$method($value);
             }
         }
     }
 }
