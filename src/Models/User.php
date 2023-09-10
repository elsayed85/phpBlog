<?php

namespace Blog\Models;

use PDO;

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
        return (new Post())->create([
            'title' => $post->title,
            'body' => $post->body,
            'user_id' => $this->id
        ]);
    }

    // Authenticate user
    public function login($username, $password)
    {
        // SQL query to find user
        $sql = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        // Execute statement with user details
        $stmt->execute([':email' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // If user exists and passwords match, return the user
        if ($user && password_verify($password, $user['password'])) {
            return (new User())->fromArray($user);
        } else {
            return false;
        }
    }

    public static function attempt($email, $password)
    {
        $user = new User();
        $validUser = $user->login($email, $password);
        if ($validUser) {
            $_SESSION['user'] = $validUser;
            return true;
        } else {
            return false;
        }
    }

    // Log out
    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();

        redirect('/login');
    }
}