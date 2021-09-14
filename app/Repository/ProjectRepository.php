<?php

namespace App\Repository;

use App\Dto\ProjectDto;
use App\Models\Project;

class ProjectRepository
{
    public function updateOrCreate(ProjectDto $dto)
    {
        return (new Project)->updateOrCreate([
            Project::ID => $dto->getId(),
        ], [
            Project::USER_ID => $dto->getUserId(),
            Project::NAME => $dto->getName()
        ]);
    }

    public function getByUser(int $userId)
    {
        return Project::ownedBy($userId)->get();
    }

    public function deleteProjectById(int $projectId)
    {
        Project::find($projectId)->delete();
    }
}
