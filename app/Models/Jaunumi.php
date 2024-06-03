<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaunumi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nosaukums',
        'attels',
    ];
}
