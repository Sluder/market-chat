<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public $timestamps = true;

    protected $table = 'followers';
    protected $fillable = ['user_id', 'follow_id'];
}
