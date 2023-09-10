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
        return view('home', [
            "user" => $user,
            "posts" => $user->posts()
        ]);
    }

    public function logout()
    {
        authLogout();
    }
}
