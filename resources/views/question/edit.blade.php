@extends('layouts.app')

@section('content')
@can('update', $question)
  <div class="container">
    <form action="/questions/{{$question->id}}" enctype="multipart/form-data" method="post">
      @csrf
      @method('PATCH')
      <div class="row">
        <div class="col-8 offset-2">

          <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label ">Title</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $question->title }}"  >
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
          <div class="form-group row">
              <label for="content" style="margin-top: 3% ;" class="col-md-4 col-form-label ">Body</label>
                  <textarea id="content" type="text"  style="height: 200px;resize:none; margin: 0  0 3%;" class="content1 form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') ?? $question->content}}" autocomplete="off">{{$question->content}}</textarea>

                  @error('content')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

          </div>
          <div class="row">
            <div class="row ">
              <button class="btn btn-primary ml-3 mt-3" type="submit">Save Changes</button>
              </form>
              <form  action="/questions/{{$question->id}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger ml-3 mt-3" type="submit">Delete Question</button>
              </form>
            </div>
          </div>

        </div>
      </div>

  </div>
@endcan
@endsection
