<?php

namespace App\Controller;

use App\Connection\Connection;
use PDO;

class MarkingController
{
    public function index(): string
    {
        return views("marking.view");
    }
}