<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Question;
class Level extends Model
{
    //
    protected $fillable=[
      'name',
      'level',
      'score'
    ];

    public function question(){
      return $this->hasMany(Question);
    }
}
