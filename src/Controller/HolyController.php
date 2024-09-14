<?php

namespace App\Controller;

use App\Connection\Connection;
use PDO;

class HolyController
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance()->getPdo();
    }

    public function index(): string
    {
        $holies = $this->fetchAll();
        return views("holy.view", ['holies' => $holies]);
    }

    public function create(): void
    {
        $name = $_POST['name'] ?? '';

        if (empty($name)) {
            addFlashMessage('error', 'Name cannot be empty');
            redirect("/holies");
            return;
        }

        $this->executeQuery(
            'INSERT INTO holy (name) VALUES (:name)',
            ['name' => $name]
        );
        addFlashMessage('success', 'Added successfully');
        redirect("/holies");
    }

    public function update(): void
    {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';

        if (empty($id) || empty($name)) {
            addFlashMessage('error', 'ID and name cannot be empty');
            redirect("/holies");
            return;
        }

        $this->executeQuery(
            'UPDATE holy SET name = :name WHERE id = :id',
            ['name' => $name, 'id' => $id]
        );
        addFlashMessage('info', 'Updated successfully');
        redirect("/holies");
    }

    public function delete(): void
    {
        $id = $_POST['id'] ?? '';

        if (empty($id)) {
            addFlashMessage('error', 'ID cannot be empty');
            redirect("/holies");
            return;
        }

        $this->executeQuery(
            'DELETE FROM holy WHERE id = :id',
            ['id' => $id]
        );
        addFlashMessage('info', 'Deleted successfully');
        redirect("/holies");
    }

    private function fetchAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM holy");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function executeQuery(string $sql, array $params): void
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }
}
