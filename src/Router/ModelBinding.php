<?php

namespace Blog\Router;

use Blog\Models\Post;
use Blog\Models\User;

class ModelBinding
{
    private static $map = [
        'post' => Post::class,
        'user' => User::class
    ];

    public static function getModelClass(String $parameter) : ?String {
        return self::$map[$parameter] ?? null;
    }
}