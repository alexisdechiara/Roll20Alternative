<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 */
class Weapons extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'range',
        'damage',
        'weight',
        'description'
    ];

    protected $table = 'weapons';
}
