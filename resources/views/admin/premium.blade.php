@extends('layouts.adminStyle')

@section('content')
<div class="col-md-1">

</div>
<div class="col-md-7">
  <h2>Premium Accounts List</h2>   
  @if(Session::has('successAddNewAccount'))
  <div class="alert alert-success">{{ Session::get('successAddNewAccount') }}</div>
  @endif
  @if(Session::has('updateSuccess'))
  <div class="alert alert-success">{{ Session::get('updateSuccess') }}</div>
  @endif      
  @foreach($errors->all() as $error)
  <div class="alert alert-danger">{{ $error }}</div>
  @endforeach
  <table class="table table-dark">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $datas)
    @if($datas->isPremium==1)
      <tr>
        <td>{{$datas->name}}</td>
        <td>{{$datas->email}}</td>
        <td>
        <a href="{{ url('admin_premium_edit/'.$datas->id)}}"><button type="button" class="btn btn-danger">Edit</button></a>
        <a href="{{ url('admin_premium_delete/'.$datas->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
      </tr>
    @endif
    @endforeach
    </tbody>
<!-- For New Premium Account -->
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h3 class="modal-title">Add New Premium Account</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('adminPremiumCreate_page') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Username:</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter username" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" id="photo">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter password" id="photo">
                                </div>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
  </table>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Add New Account
  </button>
</div>
@endsection