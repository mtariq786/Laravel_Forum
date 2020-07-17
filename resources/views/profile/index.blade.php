@extends('layouts.app')

@section('content')
<div class="profile-name">
  <h1>{{ $user->username }}</h1>
</div>

<div class="container">
  <form>

  <div class="row">
      <div class="col-8 offset-2">

        <div class="form-group row">
            <label for="fullname" class="col-md-4 col-form-label ">Fullname</label>
                <input id="fullname" readonly type="text" class="form-control" name="fullname" value="{{$user->profile->fullname }}"  >
        </div>
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label ">Title</label>
                <input id="title" readonly type="text" class="form-control" name="title" value="{{$user->profile->title}}"  >
        </div>
        <div class="form-group row">
            <label for="location" class="col-md-4 col-form-label ">Location</label>
                <input id="location" readonly type="text" class="form-control" name="location" value="{{$user->profile->location }}"  >
        </div>
          <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label ">Description</label>
                  <textarea id="description" style="resize: none; height: 250px;"readonly type="text" class=" form-control" name="description" value="{{$user->profile->description }}">{{$user->profile->description }}</TEXTAREA>
          </div>
          <div class="form-group row">
              <label for="url" class="col-md-4 col-form-label ">URL</label>
                  <input id="url" readonly type="text" class="form-control" name="url" value="{{$user->profile->url }}"  >
          </div>
          <div class="row">
            <div class="row ">
              @can('update', $user->profile)
              <a href="/profile/{{$user->id}}/edit"><button class="btn btn-primary ml-3 mt-3"  type="button" name="button">Edit Profile</button></a>
              @endcan
            </div>
          </div>
        </div>
        </div>
</form>


@endsection
