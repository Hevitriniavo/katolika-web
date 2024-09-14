<?php

namespace App\Middleware;

class AuthMiddleware
{
    const string REDIRECTION = "/responsibilities";

    public function check(): bool
    {
        return $this->isAuth();
    }


    private function isAuth(): bool
    {
        return false;
    }
}