<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastname',
        'adresse',
        'phone',
        'sexe',
        'date',
        'avatar',
        'fonction',
        'salaire',
        'dateEmbauche',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function imageUrl(): string
    {
        return Storage::disk('public')->url($this->avatar);
    }

    public function scopeEmploi(Builder $builder): Builder
    {
        return $builder->where('role','emploi');
    }

    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->orderBy('created_at','desc');
    }
}
