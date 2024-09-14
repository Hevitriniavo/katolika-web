<?php

namespace App\Controller;

use App\Connection\Connection;
use PDO;

class ActivityController
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance()->getPdo();
    }

    public function index(): string
    {
        $activities = $this->fetchAll();
        return views("activity.view", ['activities' => $activities]);
    }

    public function create(): void
    {
        $name = $_POST['name'] ?? '';

        if (empty($name)) {
            addFlashMessage('error', 'Name cannot be empty');
            redirect("/activities");
            return;
        }

        $this->executeQuery(
            'INSERT INTO activity (name) VALUES (:name)',
            ['name' => $name]
        );
        addFlashMessage('success', 'Added successfully');
        redirect("/activities");
    }

    public function update(): void
    {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';

        if (empty($id) || empty($name)) {
            addFlashMessage('error', 'ID and name cannot be empty');
            redirect("/activities");
            return;
        }

        $this->executeQuery(
            'UPDATE activity SET name = :name WHERE id = :id',
            [
                'name' => $name,
                'id' => $id
            ]
        );
        addFlashMessage('info', 'Updated successfully');
        redirect("/activities");
    }

    public function delete(): void
    {
        $id = $_POST['id'] ?? '';

        if (empty($id)) {
            addFlashMessage('error', 'ID cannot be empty');
            redirect("/activities");
            return;
        }

        $this->executeQuery(
            'DELETE FROM activity WHERE id = :id',
            ['id' => $id]
        );
        addFlashMessage('info', 'Deleted successfully');
        redirect("/activities");
    }

    private function fetchAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM activity");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function executeQuery(string $sql, array $params): void
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }
}
