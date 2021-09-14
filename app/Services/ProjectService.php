<?php

namespace App\Services;

use App\Dto\ProjectDto;
use App\Repository\ProjectRepository;
use Illuminate\Support\Collection;

class ProjectService implements IProjectService
{
    private ProjectRepository $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getByUser(int $userId): Collection
    {
        return $this->projectRepository->getByUser($userId);
    }

    public function saveProject(ProjectDto $dto): ProjectDto
    {
        return (new ProjectDto)->fromModel($this->projectRepository->updateOrCreate($dto));
    }

    public function deleteProject(int $projectId)
    {
        $this->projectRepository->deleteProjectById($projectId);
    }
}
