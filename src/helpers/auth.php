<?php

function authUser(): ?\Blog\Models\User
{
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }
    return null;
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
        redirect('/login');
        exit();
    }
}

function redirectIfAuthenticated($url = "/home"): void
{
    if (authCheck()) {
        redirect($url);
        exit();
    }
}