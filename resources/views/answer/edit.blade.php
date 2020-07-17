@extends('layouts.app')
@can('update', $answer)
@section('content')

  <div class="container">
    <form action="/questions/{{$question->id}}/answer/{{$answer->id}}" enctype="multipart/form-data" method="post">
      @csrf
      @method('PATCH')
      <div class="row">
        <div class="col-8 offset-2">


          <div class="form-group row">
              <label for="answer" style="margin-top: 3% ;" class="col-md-4 col-form-label "><h4>Answer Edit</h4></label>
                  <textarea id="answer" type="text"  style="height: 200px;resize:none; margin: 0  0 3%;" class="answer1 form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer') ?? $answer->answer}}" autocomplete="off">{{$answer->answer}}</textarea>

                  @error('answer')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

          </div>
          <div class="row">
            <div class="row ">
              <button class="btn btn-primary ml-3 mt-3" type="submit">Save Changes</button>
            </div>
            </form>
            <form  action="/questions/{{$question->id}}/answer/{{$answer->id}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger ml-5 mt-3" type="submit">Delete Answer</button>
            </form>
          </div>


        </div>
      </div>
  </div>

@endsection
@endcan
