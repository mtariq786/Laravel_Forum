<?php

namespace App\Http\Controllers;
use App\Question;
use App\User;
use App\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function __construct()
    {
      return $this->middleware('auth');
    }
    public function show(Question $question, Answer $answer)
    {
      return view('answer.show', compact('question','answer'));
    }
    public function store(Question $question)
    {

      $validatedData = request()->validate([
        'answer' => 'required|min:10|max:500',
      ]);

      $question->answers()->create([
        'answer' => request('answer'),
        'author_username' => auth()->user()->username,
        'profile_id' => auth()->user()->id,
      ]);
      return redirect('/questions/' . $question->id);

    }


    public function edit(Question $question, Answer $answer)
    {
      return view('answer.edit', compact('question', 'answer'));
    }

    public function update(Question $question, Answer $answer){
      $this->authorize('update', $answer);

      $validatedData = request()->validate([
        'answer' => 'required|min:10|max:500',
      ]);

      $answer->update($validatedData);
      return redirect('/questions/' . $question->id . '/answer/' . $answer->id);
    }

    public function destroy(Question $question, Answer $answer)
    {
      $this->authorize('delete', $answer);
      $answer->delete();
      return redirect('/questions/' . $question->id);
    }
}
