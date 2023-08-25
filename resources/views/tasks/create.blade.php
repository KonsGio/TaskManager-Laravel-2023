@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Add New Task</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('/tasks') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Task Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>
            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Back to Task List</a>
    </div>
@endsection
