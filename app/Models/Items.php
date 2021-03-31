<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 */
class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
        'description'
    ];

    protected $table = 'items';
}
