<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable=[
      'name',
      'image',
      'serie_id',
      'level_id',

    ];
}
