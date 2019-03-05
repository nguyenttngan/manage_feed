<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table='semesters';
    protected $fillable = [
        'semester','school_year'
    ];
    public function courses(){
        return $this->hasMany('App\Course');
    }
}
