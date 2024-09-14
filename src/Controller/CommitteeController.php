<?php

namespace App\Controller;

use App\Connection\Connection;
use PDO;

class CommitteeController
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance()->getPdo();
    }

    public function index(): string
    {
        $committees = $this->fetchAll();
        return views("committee.view", ['committees' => $committees]);
    }

    public function create(): void
    {
        $name = $_POST['name'] ?? '';
        $code = $_POST['code'] ?? '';

        if (empty($name) || empty($code)) {
            addFlashMessage('error', 'Name and code cannot be empty');
            redirect("/committees");
            return;
        }

        $this->executeQuery(
            'INSERT INTO committee (name, code) VALUES (:name, :code)',
            ['name' => $name, 'code' => $code]
        );
        addFlashMessage('success', 'Added successfully');
        redirect("/committees");
    }

    public function update(): void
    {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $code = $_POST['code'] ?? '';

        if (empty($id) || empty($name) || empty($code)) {
            addFlashMessage('error', 'ID, name, and code cannot be empty');
            redirect("/committees");
            return;
        }

        $this->executeQuery(
            'UPDATE committee SET name = :name, code = :code WHERE id = :id',
            ['name' => $name, 'code' => $code, 'id' => $id]
        );
        addFlashMessage('info', 'Updated successfully');
        redirect("/committees");
    }

    public function delete(): void
    {
        $id = $_POST['id'] ?? '';

        if (empty($id)) {
            addFlashMessage('error', 'ID cannot be empty');
            redirect("/committees");
            return;
        }

        $this->executeQuery(
            'DELETE FROM committee WHERE id = :id',
            ['id' => $id]
        );
        addFlashMessage('info', 'Deleted successfully');
        redirect("/committees");
    }

    private function fetchAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM committee");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function executeQuery(string $sql, array $params): void
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }
}
