@extends('layouts.app')

@section('content')
    <h1>Task List</h1>
    <ul>
        @foreach($tasks as $index => $task)
            <li>
                {{ $task['title'] }}
                @if (!$task['completed'])
                    <a href="{{ url("/tasks/$index/complete") }}">Mark as Completed</a>
                @endif
                <form action="{{ url("/tasks/$index") }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ url('/tasks/create') }}">Add New Task</a>
@endsection
