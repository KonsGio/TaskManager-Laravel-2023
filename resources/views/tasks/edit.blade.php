@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Task</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('tasks.update', $index) }}" method="post">
            @method('PATCH')
            @csrf

            @include('partials.edit-form')

            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
@endsection
