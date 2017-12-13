<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = true;

    protected $table = 'rooms';
    protected $fillable = ['name', 'uuid', 'creator_id'];
}
