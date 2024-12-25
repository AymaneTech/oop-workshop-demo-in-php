<?php

namespace App\Entity;

class Book
{
    private ?int $id;
    private ?string $title;
    private ?Author $author;

    public function __construct(int $id = 0, string $title = "", Author $author = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
    }


    public static function fromArray(array $data): Book
    {
        return new self(
            $data['id'],
            $data['title'],
            new Author($data['author_id'], $data['author_name'], $data['author_bio'])
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author): self
    {
        $this->author = $author;
        return $this;
    }
}