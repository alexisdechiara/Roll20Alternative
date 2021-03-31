<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static firstOrCreate(array $array)
 * @method static where(string $string, mixed $pid)
 */
class Players extends Model
{
    use HasFactory;

    protected $fillable = ['party_id', 'user_id', 'character_id', 'updated_at'];
    protected $table = 'players';
}
