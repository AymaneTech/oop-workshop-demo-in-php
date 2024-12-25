<?php

namespace App\Service;

use App\Entity\Author;

interface AuthorService
{
    public function findAll(): void;

    public function findById(int $id): ?Author;

    public function save(Author $author): void;
}