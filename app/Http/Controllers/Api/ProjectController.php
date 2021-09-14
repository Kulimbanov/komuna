<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ProjectCreate;
use App\Http\Requests\Api\ProjectUpdate;
use App\Services\IProjectService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProjectController extends Controller
{
    use AuthorizesRequests;

    public IProjectService $projectService;

    public function __construct(IProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(Request $request): JsonResponse
    {
        $projects = $this->projectService->getByUser($request->user()->id);

        return response()->json($projects);
    }

    public function store(ProjectCreate $projectCreate)
    {
        $this->projectService->saveProject($projectCreate->getProjectDto());
    }

    public function update(ProjectUpdate $projectUpdate)
    {
        $this->projectService->saveProject($projectUpdate->getProjectDto());
    }

    public function destroy(int $projectId)
    {
        $this->projectService->deleteProject($projectId);
    }
}
