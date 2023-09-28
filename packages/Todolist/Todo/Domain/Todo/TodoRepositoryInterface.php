<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */

 namespace packages\Todolist\Todo\Domain\Todo;

/**
 * TodoRepository interface
 * 
 */
interface TodoRepositoryInterface
{
    public function save(Todo $user);
    public function findById(TodoId $userId);
    public function findByName(TodoContent $userName);
    public function update(Todo $user);
    public function delete(Todo $user);
    public function all();
}
