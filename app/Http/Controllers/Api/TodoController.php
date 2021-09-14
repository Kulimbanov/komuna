<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\TodoCreate;
use App\Http\Requests\Api\TodoUpdate;
use App\Services\ITodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class TodoController extends Controller
{
    private ITodoService $todoService;

    public function __construct(ITodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function index($projectId): JsonResponse
    {
        $projectTodos = $this->todoService->getProjectTodos($projectId);

        return response()->json($projectTodos);
    }

    public function store(TodoCreate $request)
    {
        return $this->todoService->saveProjectTodo($request->getTodoDto())->jsonSerialize();
    }

    public function update(TodoUpdate $request)
    {
        return $this->todoService->saveProjectTodo($request->getTodoDto())->jsonSerialize();
    }
}
