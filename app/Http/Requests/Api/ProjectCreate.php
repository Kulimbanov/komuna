<?php

namespace App\Http\Requests\Api;

use App\Dto\ProjectDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProjectCreate extends FormRequest
{
    public function authorize()
    {
        return Auth::class;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'user_id' => ['required', 'int'],
        ];
    }

    public function getProjectDto(): ProjectDto
    {
        return (new ProjectDto)
            ->setName($this->get('name'))
            ->setUserId($this->get('user_id'));
    }
}
