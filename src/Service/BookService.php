<?php

namespace App\Service;

use App\Entity\Book;

interface BookService
{
    public function findAll(): array;

    public function save(Book $book): void;
}