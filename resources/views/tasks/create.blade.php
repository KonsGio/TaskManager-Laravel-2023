
@extends('layouts.app')

@section('content')
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
        <label for="title">Task Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        <button type="submit">Add Task</button>
    </form>
    <a href="{{ url('/') }}">Back to Task List</a>
@endsection
