<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

  protected $fillable = [
      'profile_id', 'title', 'content', 'author'
  ];

  public function profile()
  {
    return $this->belongsTo(Profile::Class);
  }
  public function answers()
  {
    return $this->hasMany(Answer::Class);
  }
}
