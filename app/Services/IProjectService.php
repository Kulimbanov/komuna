<?php

namespace App\Services;

use App\Dto\ProjectDto;
use Illuminate\Support\Collection;

interface IProjectService
{
    public function getByUser(int $userId): Collection;

    public function saveProject(ProjectDto $dto): ProjectDto;

    public function deleteProject(int $projectId);
}
