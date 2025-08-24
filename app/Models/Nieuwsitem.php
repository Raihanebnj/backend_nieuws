<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Nieuwsitem extends Model
{
    use HasFactory;

    // Velden die mass-assignment toegestaan zijn
    protected $fillable = [
        'titel',
        'afbeelding',
        'content',
        'publicatiedatum',
        'user_id',
    ];

    // Cast publicatiedatum automatisch naar Carbon datetime object
    protected $casts = [
        'publicatiedatum' => 'datetime',
    ];

    // Relatie: een nieuwsitem hoort bij een user (auteur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
