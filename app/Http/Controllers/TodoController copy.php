<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use packages\Todolist\Todo\Domain\Todo\TodoRepositoryInterface;
use packages\Todolist\Todo\Domain\Todo\TodoId;
use packages\Todolist\Todo\Domain\Todo\TodoTitle;
use packages\Todolist\Todo\Domain\Todo\TodoContent;
use packages\Todolist\Todo\Domain\Todo\TodoDue;
use packages\Todolist\Todo\Domain\Todo\Todo;
use DB;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(TodoRepositoryInterface $todoRepository)
    {
        $todos = $todoRepository->all();

        return view('index')->with('todos', $todos);

    }

    /**
     * @param $id
     * @param TodoRepositoryInterface $todoRepository
     * @return void
     */
    public function show($id, TodoRepositoryInterface $todoRepository)
    {
        $todoId = new TodoId($id);
        $todos = $todoRepository->findById($todoId);
    
        return view('show')->with('todos', $todos);
    }

    public function create()
    {
        return view('create');
    }

    /**
     * @param TodoRequest $request
     * @param TodoRepositoryInterface $todoRepository
     * @return void
     */
     public function store(TodoRequest $request,TodoRepositoryInterface $todoRepository)
    {
        $maxId = DB::table('todos')->max('id'); 
        $newId = $maxId + 1;
        $createTodo = new Todo(
           new TodoId($newId),
           new TodoTitle($request->input('title')) ,
           new TodoContent($request->input('content')),
           new TodoDue($request->input('due')),
            );

        $todoRepository->save($createTodo);

        return redirect('/')->with('success', 'Todo created successfuly!');
    }

    /**
     *
     * @param $id
     * @param TodoRepositoryInterface $todoRepository
     * @return void
     */
     public function edit($id, TodoRepositoryInterface $todoRepository)
     {
        $todoId = new TodoId($id);
        $todos = $todoRepository->findById($todoId);
    
        return view('edit')->with('todos', $todos);
     }

    /**
    *
    * @param TodoRequest $request
    * @param TodoRepositoryInterface $todoRepository
    * @param $id
    * @return void
    */
     public function update(TodoRequest $request,TodoRepositoryInterface $todoRepository, $id)
     {
        $updateTodo = new Todo(
            new TodoId($id),
            new TodoTitle($request->input('title')) ,
            new TodoContent($request->input('content')),
            new TodoDue($request->input('due')),
        );

        $todoRepository->update($updateTodo);
    
        return redirect('/')->with('success', 'Todo edited successfuly!');
     }

    /**
     *
     * @param TodoRepositoryInterface $todoRepository
     * @param  $id
     * @return void
     */
    public function destroy(TodoRepositoryInterface $todoRepository, $id)
    {

        $todoId = new TodoId($id);
        $todoRepository->delete($todoId);

        return redirect('/')->with('success', 'Todo deleted successfuly!');
    }
}
