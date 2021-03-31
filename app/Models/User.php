<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static find(int|string|null $id)
 * @method static where(string $string, $id)
 * @method static get()
 * @method static count()
 * @method static orderBy(string $string, string $string1)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'profile_picture',
        'localization',
        'administrator'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

}
