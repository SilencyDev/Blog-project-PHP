<?php

namespace Lib\Blog\Config;

class Configuration {

    private static $params;

    // Return param value from the config file
    public static function get($name, $defaultValue = null) {
        if (isset(self::getParams()[$name])) {
            $value = self::getparams()[$name];
        }
        else {
            $value = $defaultValue;
        }
        return $value;
    }

    // return the array from the config file
    private static function getParams() {
        if(self::$params == null) {
            $filePath = realpath(__DIR__ . "..\..\..\..\src\App\config\prod.ini");
            if (!file_exists($filePath)) {
                $filePath = realpath(__DIR__ . "..\..\..\..\src\App\config\dev.ini");
            }
            if (!file_exists($filepath)) {
                throw new Exception("Configuration file not found");
            }
            else {
                self::$params = parse_ini_file($filepath);
            }
        }
        return self::$params;
    }
}