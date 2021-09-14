<?php

namespace App\Dto;

use App\Models\Project;
use App\Traits\Jsonable;

class ProjectDto
{
    use Jsonable;

    private ?int $id;
    private int $userId;
    private string $name;

    public function fromModel(Project $project): self
    {
        $this->id = optional($project)->id;
        $this->name = $project->name;
        $this->userId = $project->user_id;

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

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
