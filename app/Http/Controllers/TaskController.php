<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Rules\MaxUserAssignedTasks;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['user', 'company', 'project'])->get();
        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request)
    {

        $task = Task::create($request->validated());
        $task->load(['user', 'company', 'project']);

        return new TaskResource($task);
    }

    public function show(Task $task)
    {
        $task->load(['user', 'company', 'project']);
        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validate());
        $task->load(['user', 'company', 'project']);
        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'Tarea eliminada correacteme'], 200);
    }
}
