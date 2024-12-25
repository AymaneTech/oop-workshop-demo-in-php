<?php

namespace App\Entity;

class Author
{
    private ?int $id;
    private ?string $name;
    private ?string $bio;

    public function __construct(int $id = 0, string $name = "", string $bio = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->bio = $bio;
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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getBio(): string
    {
        return $this->bio;
    }

    public function setBio(string $bio): self
    {
        $this->bio = $bio;
        return $this;
    }

    public static function fromArray(array $data): Author
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['bio']
        );
    }
}