<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $fillable = [
        'section_id','user_id','creator','title','topic','description', 'content', 'created_at'
    ];
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
