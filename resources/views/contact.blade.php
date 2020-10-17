@extends('layouts.index')

@section('content')

<div class="col-md-7">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30558.336330215632!2d96.17681913596367!3d16.787018860208736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ece26305ca09%3A0xc1466f3971d3efe!2sDawbon%20Township%2C%20Yangon!5e0!3m2!1sen!2smm!4v1600759193168!5m2!1sen!2smm" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<div class="col-md-5">
  <form action="{{ route('insert_contact') }}" method="post">
  @csrf
  @if(Session::has('successContact'))
  <div class="alert alert-success" style="text-align:center">
    {{ Session::get('successContact') }};
  </div>
  @endif
  @foreach($errors->all() as $error)
        <div class="alert alert-danger" style="text-align:center">
        {{ $error }}
        </div>
  @endforeach
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
      <label for="msg">Message:</label>
      <textarea name="message" id="msg" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

@endsection