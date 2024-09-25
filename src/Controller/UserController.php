<?php

namespace App\Controller;

use App\Connection\Connection;
use PDO;

class UserController
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance()->getPdo();
    }

    public function index(): string
    {
        $users = $this->fetchAll('user');
        return views("users/user.view", ['users' => $users]);
    }

    public function showCreateForm(): string
    {
        $regions = $this->fetchAll('region');
        $sacraments = $this->fetchAll('sacrament');
        $holies = $this->fetchAll('holy');
        $responsibilities = $this->fetchAll('responsibility');
        $committees = $this->fetchAll('committee');

        return views("users/user-create.view", [
            "regions" => $regions,
            "sacraments" => $sacraments,
            "holies" => $holies,
            "committees" => $committees,
            "responsibilities" => $responsibilities,
        ]);
    }

    public function showEditForm(): string
    {
        $userId = $_GET['id'] ?? null;
        if (!$userId) {
            addFlashMessage('error', 'No user ID provided.');
            redirect('/users');
            return '';
        }

        $user = $this->getById($userId);
        if (!$user) {
            addFlashMessage('error', 'User not found.');
            redirect('/users');
            return '';
        }

        $regions = $this->fetchAll('region');
        $sacraments = $this->fetchAll('sacrament');
        $holies = $this->fetchAll('holy');
        $responsibilities = $this->fetchAll('responsibility');
        $committees = $this->fetchAll('committee');

        return views("users/user-edit.view", [
            "user" => $user,
            "regions" => $regions,
            "sacraments" => $sacraments,
            "holies" => $holies,
            "committees" => $committees,
            "responsibilities" => $responsibilities,
        ]);
    }

    private function getById(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            return null;
        }
        return $this->convertKeysToCamelCase($result);
    }


    public function create(): void
    {
        $data = $this->sanitizePostData();
        $data['photo'] = $this->handleFileUpload($data['photo'] ?? null);

        $sql = "
        INSERT INTO user (
            first_name, last_name, code, qr_code, photo, committee_id, holy_id, 
            responsibility_id, sacrament_id, region_id, address, username, birth_date, 
            gender, password
        ) VALUES (
            :first_name, :last_name, :code, :qr_code, :photo, :committee_id, :holy_id, 
            :responsibility_id, :sacrament_id, :region_id, :address, :username, :birth_date, 
            :gender, :password
        )";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);

        addFlashMessage('success', 'User added successfully');
        redirect("/users");
    }

    public function update(): void
    {
        $userId = $_POST['id'] ?? null;
        if (!$userId) {
            addFlashMessage('error', 'No user ID provided.');
            redirect('/users');
            return;
        }
        $data = $this->sanitizePostData();
        if (is_null($data["password"])){
            $user = $this->getById($userId);
            $data["password"] = $user["password"];
        }
        $data['photo'] = $this->handleFileUpload($data['photo'] ?? $_POST['existingPhoto'] ?? null);
        $data['id'] = $userId;

        $sql = "
        UPDATE user SET
            first_name = :first_name,
            last_name = :last_name,
            code = :code,
            qr_code = :qr_code,
            photo = :photo,
            committee_id = :committee_id,
            holy_id = :holy_id,
            responsibility_id = :responsibility_id,
            sacrament_id = :sacrament_id,
            region_id = :region_id,
            address = :address,
            username = :username,
            birth_date = :birth_date,
            gender = :gender,
            password = :password
        WHERE id = :id
    ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        addFlashMessage('success', 'User updated successfully');
        redirect('/users');
    }

    public function delete(): void
    {
        $id = $_POST['id'] ?? '';
        if (empty($id)) {
            addFlashMessage('error', 'No user ID provided.');
        } else {
            $stmt = $this->pdo->prepare('DELETE FROM user WHERE id = :id');
            $stmt->execute(['id' => $id]);
            addFlashMessage('info', 'Deleted successfully');
        }
        redirect("/users");
    }

    private function fetchAll(string $table): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function sanitizePostData(): array
    {
        return [
            'first_name' => $_POST['firstName'] ?? null,
            'last_name' => $_POST['lastName'] ?? null,
            'code' => $_POST['code'] ?? null,
            'qr_code' => $_POST['qrCode'] ?? null,
            'committee_id' => $_POST['committeeId'] ?? null,
            'holy_id' => $_POST['holyId'] ?? null,
            'responsibility_id' => $_POST['responsibilityId'] ?? null,
            'sacrament_id' => $_POST['sacramentId'] ?? null,
            'region_id' => $_POST['regionId'] ?? null,
            'address' => $_POST['address'] ?? null,
            'username' => $_POST['username'] ?? null,
            'birth_date' => $_POST['birthDate'] ?? null,
            'gender' => $_POST['gender'] ?? null,
            'password' => !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null,
            'photo' => $_FILES['photo']['name'] ?? null,
        ];
    }

    private function handleFileUpload(?string $existingFilePath): ?string
    {
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $filePath = 'assets/' . basename($_FILES['photo']['name']);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $filePath)) {
                return $filePath;
            }
        }
        return $existingFilePath;
    }


    private function convertKeysToCamelCase(array $data): array {
        $camelCaseArray = [];

        foreach ($data as $key => $value) {
            $camelCaseKey = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            $camelCaseArray[$camelCaseKey] = $value;
        }
        return $camelCaseArray;
    }
}
