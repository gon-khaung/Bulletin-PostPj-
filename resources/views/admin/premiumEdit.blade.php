@extends('layouts.adminStyle')

@section('content')
<!-- For Premium Account Edit -->

<div class="col-md-7">
    <div class="modal-header">
        <h3 class="modal-title">Premium Account Edit</h3>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
        <form action="{{ url('admin_premium_edit') }}" method="POST">
            @csrf
            <div class="form-group">
            <input type="hidden" name="id" value="{{$data->id}}">
                <label for="name">Username:</label>
                <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Enter username" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{$data->email}}" placeholder="Enter email" id="email">
            </div>
            <div class="col-md-3">
            <button type="submit" class="btn btn-success">Confirm</button>
            </div>
        </form>
        <div class="col-md-3">
            <a href="{{ url('admin_premium') }}"><button class="btn btn-primary">back</button></a>
        </div>
    </div>
</div>

@endsection