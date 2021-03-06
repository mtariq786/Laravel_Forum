@extends('layouts.app')

@section('content')
<form class="button-create">
<a href="/questions"><button type="button" class="btn btn-primary ml-2">All Questions</button></a>
</form>
<div class="container">
  <form>
    <div class="row">
        <div class="col-8 offset-2">
    @foreach($questions as $question)
    <div class="card mt-5">
  <div class="card-header">
    Asked by : <a href="/profile/{{$question->profile_id}}">{{$question->author}}</a>
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$question->title}}</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="/questions/{{$question->id}}" class="btn btn-primary">Visit Question</a>
  </div>
</div>

    @endforeach
    <div class="">
      <div class="col-12 mt-3">
        {{$questions->links()}}
      </div>
    </div>
  </div>
</div>
</form>
</div>

@endsection
