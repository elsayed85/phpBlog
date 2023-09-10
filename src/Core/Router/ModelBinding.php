<?php

namespace Blog\Core\Router;

use Blog\Models\Post;
use Blog\Models\User;

class ModelBinding
{
    private static array $map = [];

    public function __construct()
    {
        $this->loadModels();
    }

    private function loadModels()
    {
        foreach (glob(__DIR__ . '/../Models/*.php') as $filename) {
            $class = 'Blog\\Models\\' . basename($filename, '.php');
            if (class_exists($class)) {
                self::$map[strtolower(basename($filename, '.php'))] = $class;
            }
        }
    }


    public function getModelClass(String $parameter): ?String
    {
        return self::$map[$parameter] ?? null;
    }
}
