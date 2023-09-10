<?php

namespace Blog\Models;

use PDO;
use Blog\Core\Model;

class User extends Model
{
    protected string $table = 'users';

    public ?int $id;
    public ?string $name;
    public ?string $email;
    public ?string $created_at;
    public ?string $updated_at;

    public function posts(): array
    {
        return $this->hasMany(Post::class);
    }

    public function createPost(Post $post): bool
    {
        return $post->create([
            'title' => $post->title,
            'body' => $post->body,
            'user_id' => $this->id
        ]);
    }

    // Authenticate user
    public function authenticate($username, $password)
    {
        // SQL query to find user
        $sql = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        // Execute statement with user details
        $stmt->execute([':email' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // If user exists and passwords match, return the user
        if ($user && password_verify($password, $user['password'])) {
            return $this->fromArray($user);
        } else {
            return false;
        }
    }

    public static function attempt($email, $password)
    {
        $user = new self();
        $validUser = $user->authenticate($email, $password);
        if ($validUser) {
            $_SESSION['user'] = $validUser;
            return true;
        } else {
            return false;
        }
    }
}
