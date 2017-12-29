<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomJoin extends Model
{
    public $timestamps = true;

    protected $table = 'room_joins';
    protected $fillable = ['user_id', 'room_id'];
}
