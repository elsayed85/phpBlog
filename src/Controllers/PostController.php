<?php

namespace Blog\Controllers;

use Blog\Models\Post;
use Blog\Models\User;

class PostController
{
    public function __construct()
    {
        redirectIfNotAuthenticated();
    }

    public function show(Post $post)
    {
        abort_unless($post->user_id === authUser()->id, 403, "You are not allowed to see this post");

        return view('posts.show', [
            "post" => $post
        ]);
    }

    public function edit(Post $post)
    {
        abort_unless($post->user_id === authUser()->id, 403, "You are not allowed to update this post");

        return view('posts.edit', [
            "post" => $post
        ]);
    }

    public function update(Post $post): void
    {
        abort_unless($post->user_id === authUser()->id, 403, "You are not allowed to update this post");
        $title = $_POST["title"];
        $body = $_POST["content"];
        $errors = [];

        if (empty($title)) {
            $errors["title"] = "Title is required";
        }

        if (empty($body)) {
            $errors["body"] = "Body is required";
        }

        if (count($errors)) {
            $_SESSION["errors"] = $errors;
            back();
        }

        (new Post())->update($post->id, [
            "title" => $title,
            "content" => $body
        ]);

        redirect('/');
    }

    public function store(): void
    {
        $title = $_POST["title"];
        $body = $_POST["content"];
        $errors = [];

        if (empty($title)) {
            $errors["title"] = "Title is required";
        }

        if (empty($body)) {
            $errors["body"] = "Body is required";
        }

        if (count($errors)) {
            $_SESSION["errors"] = $errors;
            back();
        }

        (new Post())->create([
            "title" => $title,
            "content" => $body,
            "user_id" => authUser()->id
        ]);

        redirect('/');
    }


    public function delete(Post $post): void
    {
        abort_unless($post->user_id === authUser()->id, 403, "You are not allowed to delete this post");

        (new Post())->delete($post->id);

        redirect('/');
    }
}