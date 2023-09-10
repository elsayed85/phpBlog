<?php

namespace Blog\Controllers;

use Blog\Models\User;

class AuthController
{
    public function __construct()
    {
        redirectIfAuthenticated();
    }

    public function login()
    {
        $sessionMessages = $this->getSessionMessages(['success', 'error']);

        return view('auth.login', $sessionMessages);
    }

    private function getSessionMessages(array $keys)
    {
        $messages = [];

        foreach ($keys as $key) {
            if (isset($_SESSION[$key])) {
                $messages[$key] = $_SESSION[$key];
                unset($_SESSION[$key]);
            }
        }

        return $messages;
    }

    public function authenticate()
    {
        $credentials = $this->getCredentials();

        if (!authAttempt($credentials['username'], $credentials['password'])) {
            $this->setSessionError('Invalid credentials');
            redirect('/login');
            exit();
        }

        redirect('/');
    }

    private function getCredentials(): array
    {
        return [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];
    }

    private function setSessionError(string $message): void
    {
        $_SESSION['error'] = $message;
    }


    public function register()
    {
        $errors = $this->getSessionErrors();

        return view('auth.register', [
            'errors' => $errors
        ]);
    }

    public function store()
    {
        $userData = $this->getUserData();
        $errors = $this->validateUserData($userData);

        if (!empty($errors)) {
            $this->setSessionErrors($errors);
            redirect('/register');
            exit();
        }

        $this->createUser($userData);
    }

    private function getSessionErrors(): array
    {
        $errors = [];
        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }
        return $errors;
    }

    private function getUserData(): array
    {
        return [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
    }

    private function validateUserData(array $userData): array
    {
        $errors = [];
        if (empty($userData['name']) || strlen($userData['name']) < 3) {
            $errors['name'] = 'Name must be at least 3 characters long';
        }
        if (empty($userData['email']) || !filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Valid email is required';
        }
        if (empty($userData['password']) || strlen($userData['password']) < 8) {
            $errors['password'] = 'Password must be at least 8 characters long';
        }
        if (!empty($userData['email']) && count((new User())->where('email', $userData['email']))) {
            $errors['email'] = 'User with this email already exists';
        }
        return $errors;
    }

    private function setSessionErrors(array $errors): void
    {
        $_SESSION['errors'] = $errors;
    }

    private function createUser(array $userData): void
    {
        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        if (!(new User())->create($userData)) {
            $this->setSessionError('Something went wrong');
            redirect('/register');
            exit();
        }

        $_SESSION['success'] = 'You have been registered successfully';
        redirect('/login');
    }
}
