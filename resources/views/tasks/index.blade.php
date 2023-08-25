@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Task List</h1>
        <ul class="list-group">
            @foreach($tasks as $index => $task)
            <li class="list-group-item task-item clickable-task-item d-flex pointer justify-content-between align-items-center {{ $task['completed'] ? 'bg-light' : '' }}">
                    <div class="d-flex align-items-center">
                        @if (!$task['completed'])
                            <form action="{{ route('tasks.complete', $index) }}" method="post">
                                @method('PATCH')
                                @csrf
                                <input type="checkbox" name="completed" value="1" onchange="this.form.submit()" {{ $task['completed'] ? 'checked' : '' }}>
                            </form>
                        @endif
                         <div class="d-flex align-items-center">
                        <span class="badge bg-success me-2 {{ $task['completed'] ? 'd-inline' : 'd-none' }}">Completed</span>
                        <span class="ms-2 {{ $task['completed'] ? 'text-decoration-line-through' : '' }}">{{ $task['title'] }}</span>
                         </div>
                    </div>
                    <div class="btn-group" role="group">
                        @if ($task['completed'])
                            <form action="{{ route('tasks.restore', $index) }}" method="post">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">
                                    <input type="hidden" name="completed" value="0">
                                    Restore
                                </button>
                            </form>
                            <form action="{{ route('tasks.destroy', $index) }}" method="post" class="ms-1">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @else
                            <a href="{{ route('tasks.edit', $index) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $index) }}" method="post" class="ms-1">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
        <a href="{{ url('/tasks/create') }}" class="btn btn-primary mt-3">Add New Task</a>
    </div>
    
    <style>
        .task-item:hover {
            background-color: #f8f9fa;
            cursor: pointer;
        }
    </style>


@endsection