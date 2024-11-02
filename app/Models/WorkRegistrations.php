<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkRegistrations extends Model
{
    use HasFactory;

    public function works(): HasMany
    {
        return $this->hasMany(
            Work::class,
            'id',
            'work_id'
        );
    }

    public function users(): HasMany
    {
        return $this->hasMany(
            User::class,
            'id',
            'user_id'
        );
    }

}
