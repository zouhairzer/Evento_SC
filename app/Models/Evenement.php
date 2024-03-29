<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable= [
        'id',
        'titre',
        'description',
        'image',
        'date',
        'lieu',
        'nombre_places_disponibles',
        'categories',
        'date_fin',
        'prix',
        'type'
    ];
}
