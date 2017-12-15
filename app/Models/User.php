<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

/**
 * @property mixed username_last_changed
 * @property mixed password
 */
class User extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    public $timestamps = true;

    protected $table = 'users';
    protected $fillable = ['name', 'username', 'username_last_changed', 'email', 'password', 'bio', 'website'];

    /**
     * Gets symbols user is watching
     */
    public function watchlist()
    {
        return $this->belongsToMany(Symbol::class, 'watchlists', 'user_id', 'symbol_id');
    }

    /**
     * Gets everyone that is following this user
     */
    public function followers()
    {
        return $this->belongsToMany('App\Models\User', 'followers', 'follow_id', 'user_id');
    }

    /**
     * Gets everyone this user is following
     */
    public function following()
    {
        return $this->belongsToMany('App\Models\User', 'followers', 'user_id', 'follow_id');
    }

    /**
     * Gets all the rooms this user has joined
     */
    public function rooms()
    {
        return $this->hasMany('App\Models\Room', 'creator_id');
    }

}
