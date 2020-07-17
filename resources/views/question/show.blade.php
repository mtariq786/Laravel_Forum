@extends('layouts.app')

@section('content')

  <form class="button-create">
  <a href="/questions"><button type="button" class="btn btn-primary ml-2">All Questions</button></a>
  <a href="/profile/questions"><button type="button" class="btn btn-primary ml-2">My Questions</button></a>
  </form>


      <div class="container">

          <div class="row">
            <div class="col-8 offset-2">

              <!-- questions -->
              <div class="cardquestion card mt-5">
                <div class="card-header">
                  Asked by : <a href="/profile/{{$question->profile_id}}">{{$question->author}}</a>
                </div>
                <div class="card-body">
                  <h4 class="card-title">{{$question->title}}</h4>
                  <p class="card-text">{{$question->content}}</p>
                  @can('update', $question)
                  <p><a href="/questions/{{$question->id}}/edit"><button class="btn btn-primary">Edit Question</button></a></p>
                  @endcan
                </div>
              </div>

              <!-- comments -->
              @foreach($answers as $answer)
              <div class="card-comments card" style="width: 100%;">
                <ul class="list-group list-group-flush">
                  <div class="answer-card card">
                    <div class="card-header">
                      Answered by : <a href="/profile/{{$answer->profile_id}}">{{$answer->author_username}}</a>
                    </div>
                    <div class="card-body">
                      <p class="card-text">{{$answer->answer}}</p>
                      @can('update', $answer)
                      <p><a href="/questions/{{$question->id}}/answer/{{$answer->id}}/edit"><button class="btn btn-primary">Edit Answer</button></a></p>
                      @endcan
                    </div>
                  </div>
                </ul>
              </div>
                @endforeach
                <div class="mt-3">
                {{$answers->links()}}
                </div>
              <form action="/questions/{{$question->id}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group row">
                    <label for="answer" style="margin-top: 3% ;" class="col-md-4 col-form-label ">Your Answer</label>
                        <textarea id="answer" type="text"  style="height: 200px;resize:none; margin: 0  0 3%;" class="answer1 form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer')}}" autocomplete="off"  ></textarea>

                        @error('answer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
                <div class="row">
                  <div class="row ">
                    <button type="submit" class="btn btn-primary ml-3 mt-3">Post your Answer</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

      </div>

@endsection
