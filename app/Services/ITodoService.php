<?php

namespace App\Services;

use App\Dto\TodoDto;
use Illuminate\Support\Collection;

interface ITodoService
{
    public function getProjectTodos(int $projectId): Collection;

    public function saveProjectTodo(TodoDto $todoDto): TodoDto;
}
