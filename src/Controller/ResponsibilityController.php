<?php

namespace App\Controller;

use App\Connection\Connection;
use PDO;

class ResponsibilityController
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance()->getPdo();
    }

    public function index(): string
    {
        $responsibilities = $this->fetchAll();
        return views("responsibility.view", ['responsibilities' => $responsibilities]);
    }

    public function create(): void
    {
        $name = $_POST['name'] ?? '';

        if (empty($name)) {
            addFlashMessage('error', 'Name cannot be empty');
            redirect("/responsibilities");
            return;
        }

        $this->executeQuery(
            'INSERT INTO responsibility (name) VALUES (:name)',
            ['name' => $name]
        );
        addFlashMessage('success', 'Added successfully');
        redirect("/responsibilities");
    }

    public function update(): void
    {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';

        if (empty($id) || empty($name)) {
            addFlashMessage('error', 'ID and name cannot be empty');
            redirect("/responsibilities");
            return;
        }

        $this->executeQuery(
            'UPDATE responsibility SET name = :name WHERE id = :id',
            ['name' => $name, 'id' => $id]
        );
        addFlashMessage('info', 'Updated successfully');
        redirect("/responsibilities");
    }

    public function delete(): void
    {
        $id = $_POST['id'] ?? '';

        if (empty($id)) {
            addFlashMessage('error', 'ID cannot be empty');
            redirect("/responsibilities");
            return;
        }

        $this->executeQuery(
            'DELETE FROM responsibility WHERE id = :id',
            ['id' => $id]
        );
        addFlashMessage('info', 'Deleted successfully');
        redirect("/responsibilities");
    }

    private function fetchAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM responsibility");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function executeQuery(string $sql, array $params): void
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }
}
