<?php

namespace Blog\Models;

use Blog\Core\Model;

class Post extends Model
{
    public ?int $id;
    public ?string $title;
    public ?string $content;
    public ?int $user_id;
    public string $table = 'posts';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function user(): array
    {
        return $this->belongsTo(User::class);
    }
}
