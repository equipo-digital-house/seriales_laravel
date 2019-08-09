<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable=[
      'name',
      'serie_id',
      'level_id',
      'image'
    ];
}
