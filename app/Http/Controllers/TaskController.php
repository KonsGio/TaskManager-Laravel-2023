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
            'title' => 'required|max:30', 
        ]);

        $task = [
            'title' => $request->input('title'),
            'completed' => false,
        ];

        session()->push('tasks', $task);

        return redirect('/')->with('success', 'Task has been created successfully.');
    }

    public function complete($taskIndex)
    {
        $tasks = session('tasks', []);

        if (isset($tasks[$taskIndex])) {
            $tasks[$taskIndex]['completed'] = true;
            session(['tasks' => $tasks]);
        }

        return redirect('/')->with('success', 'Task has been completed.');
    }

    public function destroy($taskIndex)
    {
        $tasks = session('tasks', []);

        if (isset($tasks[$taskIndex])) {
            array_splice($tasks, $taskIndex, 1);
            session(['tasks' => $tasks]);
        }

        return redirect('/')->with('success', 'Task has been deleted successfully.');
    }

    public function restore($index)
    {
        $tasks = session('tasks', []);
    
        if (isset($tasks[$index])) {
            $tasks[$index]['completed'] = false;
            session(['tasks' => $tasks]);
        }
    
        return redirect()->back()->with('success', 'Task has been restored.');
    }

    public function edit($index)
    {
        $tasks = session('tasks', []);

        if (isset($tasks[$index])) {
            $task = $tasks[$index];
            return view('tasks.edit', compact('task', 'index'));
        }

        return redirect()->back()->with('error', 'Task not found.');
    }

    public function update(Request $request, $index)
    {
        $this->validate($request, [
            'title' => 'required|max:30', 
        ]);
    
        $tasks = session('tasks', []);
    
        if (isset($tasks[$index])) {
            $tasks[$index]['title'] = $request->input('title');
            session(['tasks' => $tasks]);
    
            return redirect('/')->with('success', 'Task has been updated successfully.');
        }
    
        return redirect()->back()->with('error', 'Task not found.');
    }

}
