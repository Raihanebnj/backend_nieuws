<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Velden die massaal toewijsbaar zijn
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'verjaardag',
        'profielfoto',
        'over_mij',
        'is_admin',
    ];

    /**
     * Velden die verborgen moeten blijven in arrays/JSON
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Velden met typecasting
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
        'verjaardag' => 'date',
    ];

    /**
     * Relatie: User heeft veel Nieuwsitems
     */
    public function nieuwsitems()
    {
        return $this->hasMany(Nieuwsitem::class);
    }

    /**
     * Helper om te checken of user admin is
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->is_admin === true;
    }
}
