@extends('layouts.app')

@section('content')
    <h1>Edit new Todo</h1>
    @foreach ($todos as $todo)
    <form method="post" action="/todo/{{ $todo->id }}">
        @csrf
        @method('PUT')
     
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ $todo->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" class="form-control" name="content" id="content" placeholder="Enter content" value="{{ $todo->content }}">
        </div>
        <div class="form-group">
            <label for="due">Due</label>
            <input type="text" class="form-control" name="due" id="due" placeholder="Enter due" value="{{ $todo->due }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
@endsection