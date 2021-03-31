<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuffs extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'type_id',
    ];

    protected $table = 'stuffs';
}
