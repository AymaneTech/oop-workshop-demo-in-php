<?php

namespace App\Service\Impl;

use App\Entity\Book;
use App\Exception\ResourceNotFoundException;
use App\Repository\AuthorRepository;
use App\Repository\BookRepository;

class DefaultBookService implements \App\Service\BookService
{
    public function __construct(
        private readonly BookRepository   $repository,
        private readonly AuthorRepository $authorRepository
    )
    {
    }

    public function findAll(): array
    {
        $books = $this->repository->findAll();
        if (empty($books)) {
            throw new ResourceNotFoundException("No books found.");
        }

        foreach ($books as $book) {
            echo "Book ID: " . $book->getId() . "\n";
            echo "Title: " . $book->getTitle() . "\n";
            echo "Author: " . $book->getAuthor()->getName() . "\n";
            echo "Bio: " . $book->getAuthor()->getBio() . "\n";
            echo "----------------------\n";
        }
        return $books;
    }

    public function save(Book $book): void
    {
        $author = $this->authorRepository->findById($book->getAuthor()->getId());
        if (!$author) {
            throw new ResourceNotFoundException("No Author with id {$book->getAuthor()->getId()} Found!");
        }

        $book->setAuthor($author);
        if (!$this->repository->save($book)) {
            throw new \Exception("Failed to save the book.");
        }
    }
}
