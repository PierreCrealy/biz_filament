<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ActivityRegistrations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activities_id',
    ];

    public function activity(): HasOne
    {
        return $this->hasOne(
            Activity::class,
            'id',
            'activities_id'
        );
    }

    public function user(): HasOne
    {
        return $this->hasOne(
            User::class,
            'id',
            'user_id'
        );
    }
}
