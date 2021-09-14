<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 * @package App\Models
 * @mixin Builder
 */
class Todo extends Model
{
    use HasFactory;

    const ID = 'id';
    const DESCRIPTION = 'description';
    const PROJECT_ID = 'project_id';
    const STATE = 'state';

    const R_PROJECT = "project";

    protected $fillable = [
        self::PROJECT_ID,
        self::DESCRIPTION,
        self::STATE
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
