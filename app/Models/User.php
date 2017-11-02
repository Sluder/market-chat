<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = true;

    protected $table = 'users';

    protected $fillable = ['name', 'username', 'username_last_changed', 'email', 'password'];
}
