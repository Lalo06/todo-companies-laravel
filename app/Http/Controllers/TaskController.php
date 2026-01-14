<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Rules\MaxUserAssignedTasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => ['required', 'exists:users,id', new MaxUserAssignedTasks(5)],
            'company_id' => 'required|exists:companies,id',
            'is_completed' => 'boolean',
        ]);

        $task = Task::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'user_id' => $validated['user_id'],
            'company_id' => $validated['company_id'],
            'is_completed' => $validated['is_completed'] ?? false,
            'start_at' => now(),
            'expired_at' => now()->addDays(7)
        ]);

        $task->load(['user', 'company']);

        return response()->json([
            'message' => 'Tarea creada exitosamente',
            'task' => $task
        ], 201);
    }
}
