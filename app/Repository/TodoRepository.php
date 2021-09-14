<?php

namespace App\Repository;

use App\Dto\TodoDto;
use App\Models\Todo;
use Illuminate\Support\Collection;

class TodoRepository
{
    public function getProjectTodos(int $projectId): Collection
    {
        return Todo::where(Todo::PROJECT_ID, $projectId)->get();
    }

    public function saveTodo(TodoDto $todoDto): Todo
    {
        return (new Todo)->updateOrCreate([
            Todo::ID => $todoDto->getId()
        ], [
            Todo::PROJECT_ID => $todoDto->getProjectId(),
            Todo::DESCRIPTION => $todoDto->getDescription(),
            Todo::STATE => $todoDto->getState()
        ]);
    }
}
