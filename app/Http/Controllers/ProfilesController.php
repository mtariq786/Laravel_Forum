<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use Illuminate\Support\Facades\Auth;
class ProfilesController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }
    public function show(User $user){
      return view('profile.index', compact('user'));
    }

    public function edit(User $user)
    {
      return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
      $this->Authorize('update', $user->profile);

      $validatedData = request()->validate([
        'fullname' => 'required|max:255|max:255',
        'title' => 'required|max:255|',
        'location' => 'required|max:255|',
        'description' => 'required|max:600|',
        'url' => 'required|max:255|',
      ]);
      auth()->user()->profile->update($validatedData);
      return redirect('/profile/' . auth()->user()->id);
    }

    public function questions(User $user){
      $questions = auth()->user()->profile->questions()->latest()->paginate(4);
      return view('question.ownshow', compact('user', 'questions'));
    }
}
