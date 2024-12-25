<?php

namespace App\Entity;

class Book
{
    private int $id;
    private string $title;
    private Author $author;

    public function __construct(int $id, string $title, Author $author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
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