<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symbol extends Model
{
    public $timestamps = false;

    protected $table = 'symbols';
    protected $fillable = ['ticker', 'company_name'];
}
