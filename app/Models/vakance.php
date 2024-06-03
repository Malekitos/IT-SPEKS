<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vakance extends Model
{
    use HasFactory;

    protected $fillable = [

        'nosaukums',
        'iss_apraksts',
        'alga',
        'atrasanas_vieta',
        'attels',
        'darba_apraksts'

    ];
}
