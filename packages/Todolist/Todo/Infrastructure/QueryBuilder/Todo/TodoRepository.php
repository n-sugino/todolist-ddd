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
use packages\Todolist\Todo\Domain\Todo\TodoContent;



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
                "name" => $todo->getName()->getValue()
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
                "name" => $todo->getName()->getValue()
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
        // return new Todo(
        //     new TodoId($found->get(0)->id),
        //     new TodoContent($found->get(0)->name)
        // );
    }

    /**
     * Find todo by Name.
     *
     * @param TodoName $todoName
     * @return void
     */
    public function findByName(TodoContent $todoName)
    {
        $found = DB::table('todos')->where('content', '=', $todoName->getValue())->get();

        if ($found->isEmpty()) {
            return null;
        }

        return $found;
        // return new Todo(
        //     new TodoId($found->get(0)->id),
        //     new TodoContent($found->get(0)->content)
        // );
    }

    /**
     * Delete todo by Name.
     *
     * @param Todo $todo
     * @return void
     */
    public function delete(Todo $todo)
    {
        $found = DB::table('todos')->where('name', '=', $todo->getId()->getValue())->delete();

        // var_dump($found);
        // if ($found->isEmpty()) {
        //     return null;
        // }
    }

    public function all() 
    {
        $found = DB::table('todos')->get();
        // dd($found);
        if ($found->isEmpty()) {
            return null;
        }

        return $found;
        // return new Todo(
        //     new TodoId($found->get(0)->id),
        // );

        // return TodoModel::orderBy('created_at', 'desc')->get();;
    }

}
