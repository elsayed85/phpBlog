<?php


function view($name, $data = [])
{
    $name = str_replace('.', '/', $name);
    extract($data);
    return require "src/views/{$name}.blade.php";
}