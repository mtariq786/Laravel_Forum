<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
{
  PUBLIC function __construct(){
    $this->middleware('auth');
  }

  public function index()
  {
    $questions = \App\Question::latest()->paginate(4);
    return view('question.index', ['questions' => $questions]);
  }


  public function show(Question $question)
  {
    $answers = $question->answers()->paginate(4);
    return view('question.show', compact('question', 'answers'));
  }


  public function create(){
    return view('question.create');
  }


  public function store(User $user)
  {
    $validatedData = request()->validate([
      'title' => 'required|max:255',
      'content' => 'required|min:10|max:500',
    ]);

    \App\Question::create([
    'title' => request('title'),
    'content' => request('content'),
    'profile_id' => auth()->user()->id,
    'author' => auth()->user()->username,
  ]);
  return redirect('/questions');
  }

  public function edit(Question $question, Profile $profile)
  {
    return view('question.edit', compact('question', 'profile'));
  }




  public function update(Question $question)
  {
    $this->authorize('update', $question);

    $validatedData = request()->validate([
      'title' => 'required|max:255',
      'content' => 'required|min:10|max:500',
    ]);

      $question->update($validatedData);

    return redirect('/questions/' . $question->id);
  }
  public function destroy(Question $question)
  {
    $this->authorize('delete', $question);
    $question->delete();
    return redirect('/questions/');
  }

}
