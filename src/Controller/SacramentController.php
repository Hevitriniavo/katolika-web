<?php

namespace App\Controller;

use App\Connection\Connection;
use PDO;

class SacramentController
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance()->getPdo();
    }

    public function index(): string
    {
        $sacraments = $this->fetchAll();
        return views("sacrament.view", ['sacraments' => $sacraments]);
    }

    public function create(): void
    {
        $name = $_POST['name'] ?? '';

        if (empty($name)) {
            addFlashMessage('error', 'Name cannot be empty');
            redirect("/sacraments");
            return;
        }

        $this->executeQuery(
            'INSERT INTO sacrament (name) VALUES (:name)',
            ['name' => $name]
        );
        addFlashMessage('success', 'Added successfully');
        redirect("/sacraments");
    }

    public function update(): void
    {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';

        if (empty($id) || empty($name)) {
            addFlashMessage('error', 'ID and name cannot be empty');
            redirect("/sacraments");
            return;
        }

        $this->executeQuery(
            'UPDATE sacrament SET name = :name WHERE id = :id',
            ['name' => $name, 'id' => $id]
        );
        addFlashMessage('info', 'Updated successfully');
        redirect("/sacraments");
    }

    public function delete(): void
    {
        $id = $_POST['id'] ?? '';

        if (empty($id)) {
            addFlashMessage('error', 'ID cannot be empty');
            redirect("/sacraments");
            return;
        }

        $this->executeQuery(
            'DELETE FROM sacrament WHERE id = :id',
            ['id' => $id]
        );
        addFlashMessage('info', 'Deleted successfully');
        redirect("/sacraments");
    }

    private function fetchAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM sacrament");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function executeQuery(string $sql, array $params): void
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }
}
