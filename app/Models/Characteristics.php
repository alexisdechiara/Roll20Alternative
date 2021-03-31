<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristics extends Model
{
    use HasFactory;

    protected $fillable = [
        'strength',
        'dexterity',
        'speed',
        'constitution',
        'intelligence',
        'wisdom',
        'charisma',
    ];

    protected $table = 'characteristics';

}
