<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = session('tasks', []);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $task = [
            'title' => $request->input('title'),
            'completed' => false,
        ];

        session()->push('tasks', $task);

        return redirect('/');
    }

    public function complete($taskIndex)
    {
        $tasks = session('tasks', []);

        if (isset($tasks[$taskIndex])) {
            $tasks[$taskIndex]['completed'] = true;
            session(['tasks' => $tasks]);
        }

        return redirect('/');
    }

    public function destroy($taskIndex)
    {
        $tasks = session('tasks', []);

        if (isset($tasks[$taskIndex])) {
            array_splice($tasks, $taskIndex, 1);
            session(['tasks' => $tasks]);
        }

        return redirect('/');
    }
}
