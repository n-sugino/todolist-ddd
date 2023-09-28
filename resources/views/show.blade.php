@extends('layouts.app')

@section('content')
@foreach ($todos as $todo)
    <a href="/" class="btn btn-secondary mt-2">Go Back</a>
    <br> <br>
    <div class="badge badge-danger">{{ $todo->due }}</div>

    <h1>{{ $todo->title }}</h1>
    <hr>
    <p>{{ $todo->content }}</p>
    <br> <br>

    <div class="d-flex">
        <form  class="mr-3" action="/todo/{{ $todo->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-2 float-right">Delete</button>
        </form>
        <a href="/todo/{{ $todo->id }}/edit" class="btn btn-primary mt-2">Edit</a>
    </div>
    @endforeach

    @endsection
