<?php

namespace App\Services;

use App\Dto\TodoDto;
use App\Repository\TodoRepository;
use Illuminate\Support\Collection;

class TodoService implements ITodoService
{
    private TodoRepository $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function getProjectTodos(int $projectId): Collection
    {
        return $this->todoRepository->getProjectTodos($projectId);
    }

    public function saveProjectTodo(TodoDto $todoDto): TodoDto
    {
        return (new TodoDto)->fromModel($this->todoRepository->saveTodo($todoDto));
    }
}
