<?php

namespace App;

use App\Entity\Author;
use App\Entity\Book;
use App\Exception\ResourceNotFoundException;
use App\Repository\Impl\DefaultAuthorRepository;
use App\Repository\Impl\DefaultBookRepository;
use App\Service\Impl\DefaultAuthorService;
use App\Service\Impl\DefaultBookService;

class LibraryApp
{
    public static function run(): void
    {
        try {
            $authorRepository = new DefaultAuthorRepository();
            $bookRepository = new DefaultBookRepository();

            $authorService = new DefaultAuthorService($authorRepository);
            $bookService = new DefaultBookService($bookRepository, $authorRepository);

            echo "\nSaving new author:\n";
            $author = new Author(id: 1, name: 'John Doe', bio: 'Some bio');
            $authorService->save($author);

            echo "\nSaving new book:\n";
            $book = new Book(title: 'PHP Programming', author: $author);
            $bookService->save($book);

            echo "Fetching all authors:\n";
            $authorService->findAll();

            echo "\nFetching all books:\n";
            $books = $bookService->findAll();


        } catch (ResourceNotFoundException $e) {
            echo "Resource not found: " . $e->getMessage() . "\n";
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}