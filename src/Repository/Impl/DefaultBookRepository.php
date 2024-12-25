<?php

namespace App\Repository\Impl;

use App\Core\Database;
use App\Entity\Book;
use App\Repository\BookRepository;

class DefaultBookRepository implements BookRepository
{
    private readonly \PDO $connection;
    private readonly string $tableName;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
        $this->tableName = 'books';
    }

    public function findAll(): array
    {
        $stmt = $this->connection->query("SELECT b.*, a.id AS author_id, a.name AS author_name, a.bio AS author_bio
                                      FROM $this->tableName b
                                      LEFT JOIN authors a ON b.author_id = a.id");
        $stmt->execute();
        $books = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(fn($book) => Book::fromArray($book), $books);
    }


    public function save(Book $book): bool
    {
        $stmt = $this->connection->prepare("INSERT INTO $this->tableName (title, author_id) VALUES (:title, :author_id)");
        return $stmt->execute([
            'title' => $book->getTitle(),
            'author_id' => $book->getAuthor()->getId()
        ]);
    }
}