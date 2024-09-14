<?php

namespace App\Controller;

use App\Connection\Connection;
use PDO;

class RegionController
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance()->getPdo();
    }

    public function index(): string
    {
        $regions = $this->fetchAll();
        return views("region.view", ['regions' => $regions]);
    }

    public function create(): void
    {
        $name = $_POST['name'] ?? '';
        $code = $_POST['code'] ?? '';

        if (empty($name) || empty($code)) {
            addFlashMessage('error', 'Name and code cannot be empty');
            redirect("/regions");
            return;
        }

        $this->executeQuery(
            'INSERT INTO region (name, code) VALUES (:name, :code)',
            ['name' => $name, 'code' => $code]
        );
        addFlashMessage('success', 'Added successfully');
        redirect("/regions");
    }

    public function update(): void
    {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $code = $_POST['code'] ?? '';

        if (empty($id) || empty($name) || empty($code)) {
            addFlashMessage('error', 'ID, name, and code cannot be empty');
            redirect("/regions");
            return;
        }

        $this->executeQuery(
            'UPDATE region SET name = :name, code = :code WHERE id = :id',
            ['name' => $name, 'code' => $code, 'id' => $id]
        );
        addFlashMessage('info', 'Updated successfully');
        redirect("/regions");
    }

    public function delete(): void
    {
        $id = $_POST['id'] ?? '';

        if (empty($id)) {
            addFlashMessage('error', 'ID cannot be empty');
            redirect("/regions");
            return;
        }

        $this->executeQuery(
            'DELETE FROM region WHERE id = :id',
            ['id' => $id]
        );
        addFlashMessage('info', 'Deleted successfully');
        redirect("/regions");
    }

    private function fetchAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM region");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function executeQuery(string $sql, array $params): void
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }
}
