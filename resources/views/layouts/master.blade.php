
<!DOCTYPE html>
<html>
<head>
    <title>Mediusware</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

</head>

<body>
<nav class="navbar navbar-inverse" style="border-radius: 0!important;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/home') }}">Student Information System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav pull-right">
                <li class="">
                    <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav><div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="well">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ url('/faculties') }}">Faculties</a></li>
                    <li class="list-group-item"><a href="{{ url('/departments') }}">Departments</a></li>
                    <li class="list-group-item"><a href="{{ url('/students') }}">Students</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            @include('layouts.messages')
            @yield('content')
        </div>
    </div>
</div>


</body>
</html>