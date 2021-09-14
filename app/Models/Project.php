<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * @package App\Models
 * @mixin Builder
 * @property int $id
 * @property int $user_id
 * @property string name
 */
class Project extends Model
{
    use HasFactory;

    const ID = 'id';
    const USER_ID = 'user_id';
    const NAME = 'name';

    const R_USER = "user";

    protected $fillable = [
        self::NAME,
        self::USER_ID
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOwnedBy($query, $userId)
    {
        return $query->where(self::USER_ID, $userId);
    }
}
