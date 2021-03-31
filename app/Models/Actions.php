<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static insert(array $array)
 * @method static where(string $string, string $party_id)
 */
class Actions extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'party_id',
        'user_id',
        'data',
        'updated_at'
    ];

    protected $table = 'actions';
}
