<?php

namespace App\Repository;

use App\Entity\Author;

interface AuthorRepository
{
    public function findAll(): array;

    public function findById(int $id): ?Author;

    public function save(Author $author): bool;
}