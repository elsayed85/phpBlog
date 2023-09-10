<?php

use Blog\Core\Config;

function config($key, $default = null)
{
    return Config::get($key) ?? $default;
}
