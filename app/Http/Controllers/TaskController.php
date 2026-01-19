<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Rules\MaxUserAssignedTasks;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */

    public function store(StoreTaskRequest $request)
    {

        $task = Task::create($request->validated());
        $task->load(['user', 'company']);

        return new TaskResource($task);
    }
}
