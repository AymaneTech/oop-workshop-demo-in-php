<?php

namespace App\Repository;

use App\Entity\Book;

interface BookRepository
{
    public function findAll(): array;

    public function save(Book $book): bool;
}