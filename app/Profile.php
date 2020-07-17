<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

  protected $fillable = [
      'fullname', 'title', 'location', 'description', 'url',
  ];


  public function user()
  {
    return $this->belongsTo(User::Class);
  }

  public function questions()
  {
    return $this->hasMany(Question::Class);
  }

}
