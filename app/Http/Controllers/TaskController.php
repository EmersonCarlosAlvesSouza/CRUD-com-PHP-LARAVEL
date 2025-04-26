<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $tasks = Task::where('user_id', auth()->id())
            ->when($status, function ($query) use ($status) {
                if ($status != 'Todas') {
                    $query->where('status', $status);
                }
            })
            ->latest()
            ->paginate(5);

        return view('tasks.index', compact('tasks', 'status'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'status' => 'required|in:Pendente,Concluída', // <-- Adicionado
    ]);

    Task::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'description' => $request->description,
        'status' => $request->status, // <-- Adicionado
    ]);

    return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
}


    public function edit(Task $task)
    {

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:Pendente,Concluída',
        ]);
    
        $task->update($request->only('title', 'description', 'status'));
    
        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }
    

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa deletada com sucesso!');
    }
}
