<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Todo;

use App\Http\Models\Todo\Commons\TodoViewModel;
use Illuminate\Http\Request;
use packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoGetInfoCommand;
use packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoGetInfoServiceInterface;
use packages\Todolist\Todo\Domain\Todo\TodoRepositoryInterface;
use packages\Todolist\Todo\Domain\Todo\TodoId;
use DB;

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

    public function show($id, TodoRepositoryInterface $todoRepository)
    {
        $todoId = new TodoId($id);
        $todos = $todoRepository->findById($todoId);
    
        return view('show')->with('todos', $todos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request,TodoRepositoryInterface $todoRepository)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'content' => 'required',
                'due' => 'required'
            ]
        );

        $providedTitle = $request->input('title');
        $providedContent = $request->input('content');
        $providedDue = $request->input('due');

        $maxId = DB::table('todos')->max('id'); 
        $newId = $maxId + 1;

        $todo = Todo::create(
            Id::fromPrimitives($newId),
            Title::fromString($providedTitle),
            Content::fromString($providedContent),
            Due::fromString($providedDue),
            DateTimeValueObject::now()
        );

        $todoRepository->create($todo);

        return redirect('/')->with('success', 'Todo created successfuly!');
    }

    // public function store(UserRegisterServiceInterface $interactor, Request $request)
    // {
    //     //
    //     $params = $request->all();
    //     $command = new UserRegisterCommand($params['name']);
    //     $result = $interactor->handle($command);

    //     //TODO: 専用の ViewModel を作成してレスポンスを返す。
    //     //$userModel = new UserStoreViewModel("id001", "name001");
    //     //return view('user.store', compact('viewModel'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $todo = Todo::find($id);

    //     return view('show')->with('todo', $todo);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id, TodoRepositoryInterface $todoRepository)
     {

        $todoId = new TodoId($id);
        $todos = $todoRepository->findById($todoId);
    
        return view('edit')->with('todos', $todos);

     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request,TodoRepositoryInterface $todoRepository, $id)
     {
        $todoId = new TodoId($id);
        $todo = $todoRepository->findById($todoId);

        $providedTitle = $request->input('title');
        $providedContent = $request->input('content');
        $providedDue = $request->input('due');

        if (!empty($providedTitle)) {
            $todo->updateTitle($providedTitle);
        }

        if (!empty($providedContent)) {
            $todo->updateContent($providedContent);
        }

        if (!empty($providedDue)) {
            $todo->updateDue($providedDue);
        }

        $todoRepository->update($todo);
    
        return redirect('/')->with('success', 'Todo edited successfuly!');
     }


    // public function update(Request $request, $id)
    // {
    //     $todo = Todo::find($id);
    //     $todo->title = $request->input('title');
    //     $todo->content = $request->input('content');
    //     $todo->due = $request->input('due');
    //     $todo->save();

    //     return redirect('/')->with('success', 'Todo edited successfuly!');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/')->with('success', 'Todo deleted successfuly!');
    }
}
