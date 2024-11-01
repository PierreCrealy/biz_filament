<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelActivities extends Model
{
    use HasFactory;

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
