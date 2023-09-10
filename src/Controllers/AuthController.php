<?php

namespace Blog\Controllers;

use Blog\Models\User;

class AuthController
{
    public function login()
    {
        redirectIfAuthenticated();

        $error = [];
        $success = '';


        if (isset($_SESSION['success'])) {
            $success = $_SESSION['success'];
            unset($_SESSION['success']);
        }

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        return view('auth.login', [
            'error' => $error,
            'success' => $success
        ]);
    }

    public function authenticate()
    {
        redirectIfAuthenticated();
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!authAttempt($username, $password)) {
            $_SESSION['error'] = 'Invalid credentials';
            redirect('/login');
            exit();
        }

        redirect('/');
    }

    public function register()
    {
        redirectIfAuthenticated();

        $errors = [];
        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }

        return view('auth.register', [
            'errors' => $errors
        ]);
    }

    public function store()
    {
        redirectIfAuthenticated();

        $name = $_POST['name'];
        $email = $_POST['email'];

        $errors = [];
        if (empty($name) || strlen($name) < 3) {
            $errors['name'] = 'Name is required';
        }
        if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email is required';
        }
        if (empty($_POST['password']) || strlen($_POST['password']) < 8) {
            $errors['password'] = 'Password is required';
        }

        $users = (new User())->where('email', $email);

        if (count($users)) {
            $errors['email'] = 'User with this email already exists';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            redirect('/register');
            exit();
        }


        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $created = (new User())->create(compact('name', 'email', 'password'));

        if (!$created) {
            $_SESSION['error'] = 'Something went wrong';
            redirect('/register');
            exit();
        }

        $_SESSION['success'] = 'You have been registered successfully';

        redirect('/login');
    }

    public function logout()
    {
        redirectIfNotAuthenticated();
        authUser()->logout();
    }
}