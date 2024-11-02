<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'place',
        'begin',
        'ending',

        'min_user',
        'max_user',

        'user_id',
        'level_id',
        'type_id',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            ActivityRegistrations::class,
        );
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(ActivityRegistrations::class);
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelActivities::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(TypeActivities::class);
    }
}
