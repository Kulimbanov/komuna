<?php

namespace App\Http\Requests\Api;

use App\Dto\TodoDto;
use App\ENUM\TodoState;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TodoUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => ['required', 'int'],
            'project_id' => ['required', 'int'],
            'description' => ['required', 'string'],
            'state' => ['required', Rule::in([TodoState::TODO, TodoState::DONE])]
        ];
    }

    public function getTodoDto(): TodoDto
    {
        return (new TodoDto)
            ->setId($this->get('id'))
            ->setProjectId($this->get('project_id'))
            ->setDescription($this->get('description'))
            ->setState($this->get('state'));
    }
}

