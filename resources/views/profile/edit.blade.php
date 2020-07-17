@can('update', $user->profile)
@extends('layouts.app')

@section('content')

<div class="container">
  <form action="/profile/ {{$user->id}} " enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')



  <div class="row">
      <div class="col-8 offset-2">

        <div class="form-group row">
            <label for="fullname" class="col-md-4 col-form-label ">Fullname</label>


                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') ?? $user->profile->fullname }}"  >

                @error('fullname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>


        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label ">Title</label>


                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title}}"  >

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>

        <div class="form-group row">
            <label for="location" class="col-md-4 col-form-label ">Location</label>


                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') ?? $user->profile->location }}"  >

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>

          <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label ">Description</label>


                  <textarea id="description" type="text" style="resize: none; height: 250px" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}">{{ old('description') ?? $user->profile->description }}</textarea>

                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

          </div>

          <div class="form-group row">
              <label for="url" class="col-md-4 col-form-label ">URL</label>


                  <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}"  >

                  @error('url')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

          </div>
        <div class="row">

          <div class="row ">
            <button class="btn btn-primary ml-3 mt-3">Save Changes</button>
          </div>
        </div>
      </div>
  </div>
</form>
</div>

@endsection
@endcan
