<?php

namespace Blog\Core;

class Config
{
    protected static $configurations = [];

    public static function get($key)
    {
        $keys = explode('.', $key);

        if (empty(self::$configurations)) {
            self::loadConfigurations($keys[0]);
        }

        $config = self::$configurations;

        unset($keys[0]);

        foreach ($keys as $key) {
            if (isset($config[$key])) {
                $config = $config[$key];
            }
        }

        return $config;
    }

    protected static function loadConfigurations($key)
    {
        $files = glob(__DIR__ . '/../config/*.php');

        foreach ($files as $file) {
            $config = include $file;
            if ($file == __DIR__ . '/../config/' . $key . '.php') {
                self::$configurations = array_merge(self::$configurations, $config);
            }
        }
    }
}
