<?php

namespace App\Service\Impl;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use App\Service\AuthorService;

class DefaultAuthorService implements AuthorService
{
    public function __construct(
        private readonly AuthorRepository $repository
    )
    {
    }

    public function findAll(): void
    {
        $authors = $this->repository->findAll();

        if (empty($authors)) {
            echo "No authors found.\n";
            return;
        }

        foreach ($authors as $author) {
            echo "ID: " . $author->getId() . "\n";
            echo "Name: " . $author->getName() . "\n";
            echo "Bio: " . $author->getBio() . "\n";
            echo "----------------------\n";
        }
    }

    public function findById(int $id): ?Author
    {
        $author = $this->repository->findById($id);

        if ($author === null) {
            echo "Author with ID {$id} not found.\n";
            return null;
        }

        echo "Author Found: " . $author->getName() . "\n";
        return $author;
    }

    public function save(Author $author): void
    {
        if ($this->repository->save($author)) {
            echo "Author saved successfully.\n";
        } else {
            echo "Failed to save author.\n";
        }
    }
}
