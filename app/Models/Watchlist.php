<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    public $timestamps = true;

    protected $table = 'watchlists';
    protected $fillable = ['user_id', 'symbol_id'];
}
