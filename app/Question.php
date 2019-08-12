<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Level;
use App\Serie;
class Question extends Model
{
    //
    protected $fillable=[
      'name',
      'image',
      'serie_id',
      'level_id',

    ];
    public function level(){
      return $this->belongsTo('App\Level');
    }
    public function serie(){
      return $this->belongsTo('App\Serie');
    }
    public function answer(){
      return $this->hasMany('App\Answer');
    }
}
