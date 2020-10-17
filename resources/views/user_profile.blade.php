@extends('layouts.index')

@section('content')
<form class="form-horizontal" action="/action_page.php">

    <div class="form-group">
        <div class="col-sm-8" style="text-align:center">
            <h3>User Profile</h3>
        </div>
    </div>
    <div class="form-group">
        @if(Session::has('success'))
        <div class="alert alert-success" style="text-align:center">
            {{ Session::get('success') }}
        </div>
        @endif
        @if(Session::has('password'))
        <div class="alert alert-danger" style="text-align:center">
            {{ Session::get('password') }}
        </div>
        @endif
        @if(Session::has('passwordShort'))
        <div class="alert alert-danger" style="text-align:center">
            {{ Session::get('passwordShort') }}
        </div>
        @endif
        @if(Session::has('passwordNotMatch'))
        <div class="alert alert-danger" style="text-align:center">
            {{ Session::get('passwordNotMatch') }}
        </div>
        @endif
        @if(Session::has('passwordSuccess'))
        <div class="alert alert-success" style="text-align:center">
            {{ Session::get('passwordSuccess') }}
        </div>
        @endif
        @foreach($errors->all() as $error)
        <div class="alert alert-danger" style="text-align:center">
        {{ $error }}
        </div>
        @endforeach

    </div>       
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="pwd" placeholder="Enter password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <a href="#" data-toggle="modal" data-target="#myPassword">Change Password</a>
        </div>

    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Add News
            </button>
        </div>
    </div>
</form>

    <!-- For Password -->
    <!-- The Modal -->
    <div class="modal" id="myPassword">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Change Password</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('chg_pass') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="current">Current Password:</label>
                            <input type="text" class="form-control" name="current_password" placeholder="Enter Current Password" id="current">
                        </div>
                        <div class="form-group">
                            <label for="new">New Password:</label>
                            <input type="text" class="form-control" name="new_password" placeholder="Enter New Password" id="new">
                        </div>
                        <div class="form-group">
                            <label for="confirm">Confirm Password:</label>
                            <input type="text" class="form-control" name="confirm_password" placeholder="Enter Confirm Password" id="confirm">
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- For News -->
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h3 class="modal-title">Add News</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('insert_news') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control" name="news_title" placeholder="Enter Title" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo:</label>
                                    <input type="file" class="form-control" name="news_photo" placeholder="Enter photo" id="photo">
                                </div>
                                <div class="form-group">
                                    <label for="msg">Content:</label>
                                    <textarea name="news_content" id="msg" cols="10" rows="5" class="form-control" placeholder="Enter Content"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add News</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection