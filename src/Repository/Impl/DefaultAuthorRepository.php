<?php

namespace App\Repository\Impl;

use App\Core\Database;
use App\Entity\Author;
use App\Repository\AuthorRepository;

class DefaultAuthorRepository implements AuthorRepository
{
    private readonly \PDO $connection;
    private readonly string $tableName;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
        $this->tableName = 'authors';
    }

    public function findAll(): array
    {
        $stmt = $this->connection->query("SELECT * FROM $this->tableName");
        $stmt->execute();
        $authors = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(fn($author) => Author::fromArray($author), $authors);
    }

    public function findById(int $id): ?Author
    {
        $stmt = $this->connection->prepare("SELECT * FROM $this->tableName WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $author = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$author) {
            return null;
        }
        return Author::fromArray($author);
    }

    public function save(Author $author): bool
    {
        $stmt = $this->connection->prepare("INSERT INTO $this->tableName (name, bio) VALUES (:name, :bio)");
        return $stmt->execute([
            "name" => $author->getName(),
            "bio" => $author->getBio()
        ]);
    }
}