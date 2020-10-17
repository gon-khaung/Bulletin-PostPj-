@extends('layouts.adminStyle')

@section('content')
<div class="col-md-1">
    
</div>
<div class="col-md-7">
<form class="form-horizontal" action="/action_page.php">
<h3 style="text-align:center;">Admin Home Page</h3>
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
                                <form action="/action_page.php">
                                <div class="form-group">
                                        <label for="current">Current Password:</label>
                                        <input type="text" class="form-control" placeholder="Enter Current Password" id="current">
                                    </div>
                                    <div class="form-group">
                                        <label for="new">New Password:</label>
                                        <input type="text" class="form-control" placeholder="Enter New Password" id="new">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm">Confirm Password:</label>
                                        <input type="text" class="form-control" placeholder="Enter Confirm Password" id="confirm">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
</div>
@endsection