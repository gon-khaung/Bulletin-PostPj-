@extends('layouts.adminStyle')

@section('content')
<div class="col-md-1">

</div>
<div class="col-md-7">
  <h2>Contact List</h2>         
  <table class="table table-dark">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $datas)
    <tr>
        <td>{{$datas->name}}</td>
        <td>{{$datas->email}}</td>
        <td>{{$datas->message}}</td>
        <td>
        <a href="{{ url('admin_contact_delete/'.$datas->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
    </tr>
    @endforeach  
    </tbody>
  </table>
</div>

@endsection