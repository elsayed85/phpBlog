<?php

namespace Blog\Controllers;

use Blog\Models\Post;

class HomeController
{
    public function __construct()
    {
        redirectIfNotAuthenticated();
    }

    public function home()
    {
        $user = authUser();
        $posts = $user->posts();
        return view('home', [
            "user" => $user,
            "posts" => $posts
        ]);
    }
}