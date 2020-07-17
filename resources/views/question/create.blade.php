@extends('layouts.app')

@section('content')

<div class="container">
  <form action="/questions" enctype="multipart/form-data" method="post">
    @csrf


    <div class="row">
      <div class="col-8 offset-2">


        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label ">Title</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')}}" autocomplete="off" >

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>


        <div class="form-group row">
            <label for="content" class="col-md-4 col-form-label ">Body</label>
                <textarea id="content" type="text" class="content1 form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content')}}" autocomplete="off"  ></textarea>

                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="row">
          <div class="row ">
            <button class="btn btn-primary ml-3 mt-3">Ask Question</button>
          </div>
        </div>

      </div>
    </div>

</form>
</div>

@endsection
