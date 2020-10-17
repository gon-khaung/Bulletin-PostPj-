@extends('layouts.index')

@section('content')

<div class="jumbotron text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container">
  <div class="row">
    @foreach($data as $datas)
    <div class="col-sm-4">
      <h3>{{$datas->news_title}}</h3>
      <img src="{{ asset('photos/'.$datas->news_photo) }}" alt="" width="300" height="200"><br>
      <!-- <p>{{$datas->news_content}}</p> -->
      <button type="button" class="btn btn-info" style="margin-top:10px">See More...</button>
    </div>
    @endforeach
  </div>
</div>

@endsection