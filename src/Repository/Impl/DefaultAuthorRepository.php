<?php

namespace App\Repository\Impl;

use App\Core\Database;
use App\Entity\Author;
use App\Repository\AuthorRepository;

class DefaultAuthorRepository implements AuthorRepository
{
    private \PDO $connection;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM author");

        return $stmt->fetchAll();
    }

    public function findById(int $id): ?Author
    {
        // TODO: Implement findById() method.
    }

    public function save(Author $author): bool
    {
        // TODO: Implement save() method.
    }
}