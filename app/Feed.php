<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Feed extends Model
{
    protected $table = 'feeds';

    protected $fillable = ['title', 'url'];

    public $timestamps = false;
}
