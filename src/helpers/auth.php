<?php

function authUser(): ?\Blog\Models\User
{
    return $_SESSION['user'] ?? null;
}

function authCheck(): bool
{
    return isset($_SESSION['user']);
}

function authAttempt($username, $password): bool
{
    return \Blog\Models\User::attempt($username, $password);
}

function redirectIfNotAuthenticated(): void
{
    if (!authCheck()) {
        header('Location: /login');
        exit();
    }
}

function redirectIfAuthenticated($url = "/"): void
{
    if (authCheck()) {
        header('Location: ' . $url);
        exit();
    }
}

function authLogout()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_unset();
    session_destroy();

    redirect('/login');
}
