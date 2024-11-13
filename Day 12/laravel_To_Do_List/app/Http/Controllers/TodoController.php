<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // Show all todos
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    // Store a new todo
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        Todo::create([
            'task' => $request->task,
        ]);

        return redirect()->route('todos.index');
    }

    // Mark todo as completed
    public function complete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = true;
        $todo->save();

        return redirect()->route('todos.index');
    }

    // Delete a todo
    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect()->route('todos.index');
    }
}
