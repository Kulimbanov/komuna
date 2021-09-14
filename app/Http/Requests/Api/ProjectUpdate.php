<?php

namespace App\Http\Requests\Api;

use App\Dto\ProjectDto;
use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => ['required', 'int'],
            'user_id' => ['required', 'int'],
            'name' => ['required', 'string']
        ];
    }

    public function getProjectDto(): ProjectDto
    {
        return (new ProjectDto)
            ->setId($this->get('id'))
            ->setName($this->get('name'))
            ->setUserId($this->get('user_id'));
    }
}
