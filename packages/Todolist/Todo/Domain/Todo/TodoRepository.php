<?php

namespace packages\Todolist\Todo\Domain\Todo;

interface TodoRepository
{
    public function create(Todo $todo): void;

    public function update(Todo $todo): void;

       /**
     * @throws TodoNotFoundException
     */
    public function findById(Id $id): Todo;

    public function delete(Id $id): Todo;

    public function all(Todo $todo);

}
