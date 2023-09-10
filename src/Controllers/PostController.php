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

    private function authorizePostView(Post $post): void
    {
        abort_unless($post->getUserId() === authUser()->id, 403, "You are not allowed to see this post");
    }

    private function authorizePostUpdate(Post $post): void
    {
        abort_unless($post->getUserId() === authUser()->id, 403, "You are not allowed to update this post");
    }

    private function authorizePostDelete(Post $post): void
    {
        abort_unless($post->getUserId() === authUser()->id, 403, "You are not allowed to delete this post");
    }

    public function show(Post $post)
    {
        $this->authorizePostView($post);

        return view('posts.show', [
            "post" => $post
        ]);
    }

    public function edit(Post $post)
    {
        $this->authorizePostUpdate($post);

        return view('posts.edit', [
            "post" => $post
        ]);
    }

    public function update(Post $post): void
    {
        $this->authorizePostUpdate($post);
        $postData = $this->getPostData();
        $this->validatePostData($postData);

        $post->update($postData);

        redirect('/');
    }

    public function store(): void
    {
        $postData = $this->getPostData();
        $this->validatePostData($postData);

        (new Post())->create([
            "title" => $postData["title"],
            "content" => $postData["content"],
            "user_id" => authUser()->id
        ]);

        redirect('/');
    }

    private function getPostData(): array
    {
        return [
            "title" => $_POST["title"],
            "content" => $_POST["content"]
        ];
    }

    private function validatePostData(array $postData): void
    {
        $errors = [];

        if (empty($postData["title"])) {
            $errors["title"] = "Title is required";
        }

        if (empty($postData["content"])) {
            $errors["body"] = "Body is required";
        }

        if (count($errors)) {
            $_SESSION["errors"] = $errors;
            back();
        }
    }

    public function delete(Post $post): void
    {
        $this->authorizePostDelete($post);

        $post->delete();

        redirect('/');
    }
}
