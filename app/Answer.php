<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  protected $fillable = [
      'question_id','author_username','profile_id', 'answer',
  ];
  public function question()
  {
    return $this->belongsTo(Question::Class);
  }
}
