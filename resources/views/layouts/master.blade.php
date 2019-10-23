
<!DOCTYPE html>
<html>
<head>
    <title>Mediusware</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
         </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="container">

    <div class="row" style="margin-top: 75px!important;">
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
            @include('layouts.inc.messages')
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('/js/app.js') }}"></script>
<script>

    setTimeout(function () {
        $('.alert').hide();
    }, 5000);

    // delete row
    $(document).on('click', '.deleteRow', function () {
        var del = confirm('Are you sure want to delete ?');
        var url = $(this).attr('data-action');
        var _token = '{{ csrf_token() }}';
        if(del){
            $.ajax({
                type:'post',
                url:url,
                data:{
                    _method:'delete',
                    _token: _token
                },
                success:function (data) {
                    location.reload();
                }

            });
        }

    });
    // file upload validation
    $('.photo').bind('change', function () {
        var fileSize = this.files[0].size;
        var maxSize  = 500000;// 500kb
        if(fileSize > maxSize){
            alert('Sorry! Maximum upload size 500kb');
            $('.photo').val('');
        }
        var validExtension = ['jpg','jpeg','png','JPG','JPEG','PNG'];
        if($.inArray($(this).val().split('.').pop().toLowerCase(), validExtension) == -1){
            alert('Sorry! Only jpg, jpeg and png formats are allowed');
            $('.photo').val('');
        }
    });
</script>

</body>
</html>