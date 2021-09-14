<?php

namespace App\Dto;

use App\Models\Todo;
use App\Traits\Jsonable;

class TodoDto
{
    use Jsonable;

    private ?int $id;
    private int $projectId;
    private string $description;
    private string $state;

    public function fromModel(Todo $todo): self
    {
        $this->id = $todo->id;
        $this->projectId = $todo->project_id;
        $this->description = $todo->description;
        $this->state = $todo->state;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getProjectId(): int
    {
        return $this->projectId;
    }

    public function setProjectId(int $projectId): self
    {
        $this->projectId = $projectId;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

}
