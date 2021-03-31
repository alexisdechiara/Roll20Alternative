<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $pid)
 * @method static firstOrCreate(array $array)
 * @method static orderBy(string $string, string $string1)
 * @method static get()
 * @method static count()
 */
class Parties extends Model
{

    protected $fillable = ['name', 'user_id', 'slug', 'password', 'players', 'cover_picture', 'description', 'themes', 'updated_at'];
    protected $table = 'parties';

}
