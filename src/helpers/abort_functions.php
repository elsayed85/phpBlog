<?php

function abort_if($boolean, int $httpCode, string $message = ''): void
{
    if ($boolean) {
        http_response_code($httpCode);
        exit($message);
    }
}

function abort_unless($boolean, int $httpCode, string $message = ''): void
{
    if (!$boolean) {
        http_response_code($httpCode);
        exit($message);
    }
}
