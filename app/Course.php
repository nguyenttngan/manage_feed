<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='courses';
    protected $fillable = [
        'course_code','course_name','number_of_credits','lecturer_id','semester_id'
    ];
    public function lecturer(){
        return $this->belongsTo('App\Lecturer');
    }
    public function semester(){
        return $this->belongsTo('App\Semester');
    }
}
