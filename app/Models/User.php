<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    protected $fillable = [

        'lastname',
        'name',
        'date_birth',
        'tel',
        'gender',

        'role_id',
        'type_id',
        'status_id',

        'password',
        'email',

        'email_verified_at',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

     # Relations with others models
    public function role(): BelongsTo
    {
        return $this->belongsTo(RoleUser::class, 'role_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusUser::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(TypeUser::class);
    }

    public function horses(): HasMany
    {
        return $this->hasMany(Horse::class);
    }



    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(
            Activity::class,
            ActivityRegistrations::class,
        );
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }


    //

    public function works(): BelongsToMany
    {
        return $this->belongsToMany(
            Work::class,
            WorkRegistrations::class,
        );
    }

    public function medicals(): BelongsToMany
    {
        return $this->belongsToMany(
            Medical::class,
            MedicalRegistrations::class,
        );
    }


    public function availabilities(): HasMany
    {
        return $this->hasMany(Availability::class);
    }

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }



    //

    public function getFullName()
    {
        return $this->lastname.' '.$this->firstname;
    }

    public function isAdmin()
    {
        return $this->role_id === 2 ? true : false;
    }
}
