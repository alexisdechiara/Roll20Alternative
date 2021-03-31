<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static insert(array $array)
 * @method static where(string $string, string $party_id)
 */
class Chats extends Model
{
    use HasFactory;

    protected $fillable = ['party_id', 'user_id', 'message', 'updated_at', 'created_at'];
    protected $table = 'chats';
}
