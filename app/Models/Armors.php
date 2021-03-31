<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 */
class Armors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'resistance',
        'weight',
        'description'
    ];

    protected $table = 'armors';
}
