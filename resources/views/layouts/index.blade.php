<!DOCTYPE html>
<html lang="en">

<head>
  <title>Index Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('index') }}">Bulletin</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ route('index') }}">Home</a></li>
        <li><a href="{{ route('admin_home') }}">Admin</a></li>
        <li><a href="{{ route('userprofile_page') }}">User Profile</a></li>
        <li><a href="{{ route('contact_page') }}">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="glyphicon glyphicon-log-in"> </span>  {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>


    </div>
  </nav>

  @yield('content')

</body>

</html>