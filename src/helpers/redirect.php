<?php

function redirect($url): void
{
    header('Location: '.$url);
}

function back(): void
{
    header('Location: '.$_SERVER['HTTP_REFERER']);
}