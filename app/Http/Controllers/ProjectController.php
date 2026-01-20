<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('tasks')->get();
        return ProjectResource::collection($projects);
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());

        return new ProjectResource($project);
    }
}
