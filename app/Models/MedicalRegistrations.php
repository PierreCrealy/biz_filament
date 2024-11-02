<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MedicalRegistrations extends Model
{
    use HasFactory;

    public function medicals(): HasMany
    {
        return $this->hasMany(
            Medical::class,
            'id',
            'medical_id'
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
