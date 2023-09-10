<?php

namespace Blog\Models;

class Post extends Model
{
    public ?int $id;
    public ?string $title;
    public ?string $content;
    public ?int $user_id;
    protected string $table = 'posts';

    public function user(): array
    {
        return $this->belongsTo(User::class);
    }
}