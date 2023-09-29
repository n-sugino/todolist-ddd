<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */

namespace packages\Todolist\Todo\Infrastructure\QueryBuilder\Todo;

use Illuminate\Support\Facades\DB;
use packages\Todolist\Todo\Domain\Todo\TodoRepositoryInterface;
use packages\Todolist\Todo\Domain\Todo\Todo;
use packages\Todolist\Todo\Domain\Todo\TodoId;

/**
 * TodoRepository class
 *
 */
class TodoRepository implements TodoRepositoryInterface
{

    /**
     * Save new Todo.
     *
     * @param Todo $todo
     * @return void
     */
    public function save(Todo $todo)
    {
        DB::table('todos')->insert(
            [
                "id" => $todo->getId()->getValue(),
                "title" => $todo->getTitle()->getValue(),
                "content" => $todo->getContent()->getValue(),
                "due" => $todo->getDue()->getValue(),
                "created_at" => now(),
            ]
        );
    }

    /**
     * UpdateTodo.
     *
     * @param Todo $todo
     * @return void
     */
    public function update(Todo $todo)
    {
        DB::table('todos')->where('id', $todo->getId()->getValue())->update(
            [
                "id" => $todo->getId()->getValue(),
                "title" => $todo->getTitle()->getValue(),
                "content" => $todo->getContent()->getValue(),
                "due" => $todo->getDue()->getValue(),
                "updated_at" => now(),
            ]
        );
    }

    /**
     * Find todo by Id.
     *
     * @param TodoId $todoId
     * @return void
     */
    public function findById(TodoId $todoId)
    {
        $found = DB::table('todos')->where('id', '=', $todoId->getValue())->get();

        if ($found->isEmpty()) {
            return null;
        }
        return $found;
    }

    /**
     * Delete todo by Name.
     *
     * @param Todo $todo
     * @return void
     */
    public function delete(TodoId $todoId)
    {
        $found = DB::table('todos')->where('id', '=', $todoId->getValue())->delete();
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
