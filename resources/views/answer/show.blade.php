@extends('layouts.app')

@section('content')

  <form class="button-create">
  <a href="/questions/{{$question->id}}"><button type="button" class="btn btn-primary ml-2">Go Back</button></a>
  </form>


      <div class="container">
          <div class="row">
            <div class="col-8 offset-2">
              <div class="cardquestion card mt-5">
                <div class="card-header">
                  Answered by : <a href="/profile/{{$question->profile_id}}">{{$answer->author_username}}</a>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Answer edited</h6>
                  <p class="card-text">{{$answer->answer}}</p>
                  @can('update', $answer)
                  <p><a href="/questions/{{$question->id}}/answer/{{$answer->id}}/edit"><button class="btn btn-primary">Edit Answer</button></a></p>
                  @endcan
                </div>
              </div>
            </div>
          </div>
      </div>

@endsection
