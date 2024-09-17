<?php

namespace App\Controller;

use App\Connection\Connection;
use PDO;

class OperationController
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance()->getPdo();
    }

    public function index(): string
    {
        $stmt = $this->pdo->prepare("SELECT * FROM operation");
        $stmt->execute();
        $operations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return views("operation.view", [
            "operations" => $operations
        ]);
    }
}