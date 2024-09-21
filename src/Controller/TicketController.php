<?php

namespace App\Controller;

use App\Connection\Connection;
use PDO;

class TicketController
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance()->getPdo();
    }

    public function index(): string
    {
        $tickets = $this->fetchAllTickets();
        $users = $this->fetchUsers();
        $operations = $this->fetchOperations();
        return views("ticket.view", [
            "tickets" => $tickets,
            "users" => $users,
            "operations" => $operations
        ]);
    }

    public function createTicket(): void
    {
        $data = $this->validateTicketData();

        if ($data === null) {
            addFlashMessage('error', 'All required fields must be filled out.');
            redirect('/tickets/create');
            return;
        }

        $this->executeQuery(
            "INSERT INTO ticket (`from`, `to`, operation_id, account_id, paid, distribution)
            VALUES (:from, :to, :operation_id, :account_id, :paid, :distribution)",
            $data
        );

        addFlashMessage('success', 'Ticket created successfully!');
        redirect('/tickets');
    }

    public function updateTicket(): void
    {
        $id = $_POST['id'] ?? null;
        $data = $this->validateTicketData();

        if ($id === null || $data === null) {
            addFlashMessage('error', 'All required fields must be filled out.');
            redirect("/tickets/update?id=$id");
            return;
        }

        $data['id'] = $id;

        $this->executeQuery(
            "UPDATE ticket 
            SET `from` = :from, `to` = :to, operation_id = :operation_id,
                account_id = :account_id, paid = :paid, distribution = :distribution 
            WHERE id = :id",
            $data
        );

        addFlashMessage('success', 'Ticket updated successfully!');
        redirect('/tickets');
    }

    public function deleteTicket(): void
    {
        $id = $_POST['id'] ?? null;

        if ($id === null) {
            addFlashMessage('error', 'ID cannot be empty');
            redirect("/tickets");
            return;
        }

        $this->executeQuery('DELETE FROM ticket WHERE id = :id', ['id' => $id]);
        addFlashMessage('info', 'Ticket deleted successfully');
        redirect("/tickets");
    }

    private function executeQuery(string $sql, array $params): void
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }

    private function validateTicketData(): ?array
    {
        $from = $_POST['from'] ?? null;
        $to = $_POST['to'] ?? null;
        $operationId = $_POST['operation_id'] ?? null;
        $accountId = $_POST['account_id'] ?? null;
        $paid = $_POST['paid'] ?? null;
        $distribution = $_POST['distribution'] ?? null;

        if ($from === null || $to === null || $operationId === null || $accountId === null) {
            return null;
        }

        return [
            'from' => $from,
            'to' => $to,
            'operation_id' => $operationId,
            'account_id' => $accountId,
            'paid' => $paid,
            'distribution' => $distribution,
        ];
    }

    private function fetchAllTickets(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ticket");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function fetchUsers(): array
    {
        $stmt = $this->pdo->prepare("SELECT id, CONCAT(first_name, ' ', last_name) AS name FROM user");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function fetchOperations(): array
    {
        $stmt = $this->pdo->prepare("SELECT id, name FROM operation");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
