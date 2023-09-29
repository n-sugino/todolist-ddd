<?php

namespace packages\Todolist\Todo\Domain\Todo;

use Illuminate\Support\Facades\DB;

final class Todo
{
    public function __construct(
        TodoId $id,
        TodoTitle $title,
        TodoContent $content,
        TodoDue $due,
       
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->due = $due;
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

    public function getContent()
    {
        return $this->content;
    }

    public function getDue()
    {
        return $this->due;
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

    public function allData()
    {
        $found = DB::table('todos')->orderBy('created_at', 'desc')->get();
        if ($found->isEmpty()) {
            return null;
        }
        return $found;
    }



}
