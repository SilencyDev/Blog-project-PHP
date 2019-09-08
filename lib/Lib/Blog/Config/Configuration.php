<?php

namespace API\Lib\Blog\Config;

class Configuration
{
    private static $params;

    // Return param value from the config file
    public static function get($name, $defaultValue = null)
    {
        if (isset(self::getParams()[$name])) {
            $value = self::getParams()[$name];
            return $value;
        }
        $value = $defaultValue;
        return $value;
    }

    // return the array from the config file
    private static function getParams()
    {
        if (self::$params == null) {
            $filePath = realpath(__DIR__."/../../../../src/App/Blog/config/prod.ini");
            if (!file_exists($filePath)) {
                $filePath = realpath(__DIR__."/../../../../src/App/Blog/config/dev.ini");
            }
            if (!file_exists($filePath)) {
                throw new \Exception("Configuration file not found");
            } else {
                self::$params = parse_ini_file($filePath);
            }
        }
        return self::$params;
    }
}
