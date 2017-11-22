<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    public $timestamps = true;

    protected $table = 'users';
    protected $fillable = ['name', 'username', 'username_last_changed', 'email', 'password', 'bio', 'website'];

    // Gets users watchlist
    public function watchlist()
    {
        return $this->belongsToMany(Symbol::class, 'watchlists', 'user_id', 'symbol_id');
    }

}
