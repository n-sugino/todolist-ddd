<?php

namespace App\Domain\Todo\Aggregate;
namespace packages\Todolist\Todo\Domain\Todo;


// use App\Domain\Shared\ValueObject\DateTimeValueObject;

final class Todo
{
    public function __construct(
        TodoId $id,
        // TodoTitle $title,
        // TodoContent $content,
        // TodoDue $due,
       
    ) {
        $this->id = $id;
        // $this->title = $title;
        // $this->content = $content;
        // $this->due = $due;
    }

    public static function create(
        TodoId $id,
        TodoTitle $title,
        TodoContent $content,
        TodoDue $due,
        DateTimeValueObject $createdAt,
        ?DateTimeValueObject $updatedAt = null,
    ): self {
        return new self(
            $id,
            $title,
            $content,
            $due,
            $createdAt,
            $updatedAt,
        );
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function id(): Id
    {
        return $this->id;
    }

    public function title(): Title
    {
        return $this->title;
    }

    public function content(): Content
    {
        return $this->content;
    }

    public function due(): Due
    {
        return $this->due;
    }

    public function createdAt(): DateTimeValueObject
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?DateTimeValueObject
    {
        return $this->updatedAt;
    }

    public function updateTitle(string $title): void
    {
        $this->title = Title::fromString($title);
    }

    public function updateContent(string $content): void
    {
        $this->content = Content::fromString($content);
    }

    public function updateDue(string $due): void
    {
        $this->due = Due::fromString($due);
    }

    public function asArray(): array
    {
        return [
            'id' => $this->id()->value(),
            'title' => $this->title()->value(),
            'content' => $this->content()->value(),
            'due' => $this->due()->value(),
            'created_at' => $this->createdAt()->value(),
            'updated_at' => $this->updatedAt()?->value(),
        ];
    }
}
