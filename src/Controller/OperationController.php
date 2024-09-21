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
        $operations = $this->fetchAllOperations();
        return views("operation.view", ["operations" => $operations]);
    }

    public function createOperation(): void
    {
        $data = $this->validateOperationData();

        if ($data === null) {
            addFlashMessage('error', 'All required fields must be filled out.');
            redirect('/operations/create');
            return;
        }

        $this->executeQuery(
            "INSERT INTO operation (name, ticket_count, operation_date, description, ticket_price)
            VALUES (:name, :ticket_count, :operation_date, :description, :ticket_price)",
            $data
        );

        addFlashMessage('success', 'Operation created successfully!');
        redirect('/operations');
    }

    public function updateOperation(): void
    {
        $id = $_POST['id'] ?? null;
        $data = $this->validateOperationData();

        if ($id === null || $data === null) {
            addFlashMessage('error', 'All required fields must be filled out.');
            redirect("/operations/update?id=$id");
            return;
        }

        $data['id'] = $id;

        $this->executeQuery(
            "UPDATE operation SET name = :name, ticket_count = :ticket_count, operation_date = :operation_date,
            description = :description, ticket_price = :ticket_price WHERE id = :id",
            $data
        );

        addFlashMessage('success', 'Operation updated successfully!');
        redirect('/operations');
    }

    public function deleteOperation(): void
    {
        $id = $_POST['id'] ?? null;

        if ($id === null) {
            addFlashMessage('error', 'ID cannot be empty');
            redirect("/operations");
            return;
        }

        $this->executeQuery(
            'DELETE FROM operation WHERE id = :id',
            ['id' => $id]
        );

        addFlashMessage('info', 'Deleted successfully');
        redirect("/operations");
    }

    private function executeQuery(string $sql, array $params): void
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }

    private function validateOperationData(): ?array
    {
        $name = $_POST['name'] ?? null;
        $ticketCount = $_POST['ticket_count'] ?? null;
        $operationDate = $_POST['operation_date'] ?? null;
        $description = $_POST['description'] ?? null;
        $ticketPrice = $_POST['ticket_price'] ?? null;

        if ($name === null || $ticketCount === null || $operationDate === null || $description === null || $ticketPrice === null) {
            return null;
        }

        return [
            'name' => $name,
            'ticket_count' => $ticketCount,
            'operation_date' => $operationDate,
            'description' => $description,
            'ticket_price' => $ticketPrice,
        ];
    }

    private function fetchAllOperations(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM operation");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
