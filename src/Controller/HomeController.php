<?php

namespace App\Controller;

class HomeController
{
    public function index(): string
    {
        return views("home.view");
    }
}