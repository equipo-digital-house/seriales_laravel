<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
class Serie extends Model
{
    //
    protected $fillable=[
      'name',
      'image'
    ];
    public function question(){
      return $this->hasMany('App\Question');
    }
}
