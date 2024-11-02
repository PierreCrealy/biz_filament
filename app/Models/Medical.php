<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Medical extends Model
{
    use HasFactory;

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_medical_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            MedicalRegistrations::class,
        );
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(MedicalRegistrations::class);
    }
}
