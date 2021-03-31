<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static get()
 * @method static count()
 */
class Characters extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'DOB',
        'level',
        'max_health_point',
        'health_point',
        'weight',
        'height',
        'gender',
        'skin_color',
        'hair_color',
        'eye_color',
        'melee_attack',
        'dist_attack',
        'magic_attack',
        'desc_attack',
        'melee_defense',
        'dist_defense',
        'magic_defense',
        'desc_defense',
        'day_vision',
        'night_vision',
        'resistance',
        'desc_other',
        'class',
        'birth_location',
        'current_location',
        'race',
        'cult',
        'skills_id',
        'stuffs_id',
        'characteristic_id',
        'user_id'
    ];
    protected $table = 'characters';

}
