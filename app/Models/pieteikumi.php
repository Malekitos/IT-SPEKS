<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pieteikumi extends Model
{
    use HasFactory;

    protected $fillable = [

        'vakance',
        'vards',
        'uzvards',
        'talrunis',
        'epasts',
        'cv',
        'komentars',
        'statuss'

    ];
}
