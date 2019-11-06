<html>
<head>


    <title>Lost and Found</title>

    <link href="css\f.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- header style-->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>

    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <!-- header style-->


    <style>


    </style>

</head>
<body>
<!--- header-->

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/home') }}">Admin Home</a>
        </div>

        <ul class="nav navbar-nav" id="nav-topics" style="display:inline;">
            <li><a href="{{ url('/vie2') }}">Asssign Tasks</a></li>
            <li><a href="{{ url('/vie') }}">Work Orders</a></li>
            <li><a href="{{ url('/Update') }}">Room Status</a></li>
            <li><a href="{{ url('/found') }}">Lost and Found Items</a></li>
            <li><a href="{{ url('/Srepo') }}">Reports</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right" id="nav-sign">
        <!--
                <li><a href="{{ url('/profile') }}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                -->

            <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>
</div>


<!--- header-->

@foreach($errors->all() as $error)

    <div class="alert alert-danger" role="alert">
        {{$error}}

    </div>

@endforeach


<h1>Lost and Found Items</h1>
<div class="container">
    <div class="jumbotron">
        <form action="{{ route('addimage') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label>Item Type</label>
                <input type="text" name="typo" class="form-control" placeholder="Enter Type">
            </div>

            <div class="form-group">
                <label>Place</label>
                <input type="text" name="place" class="form-control" placeholder="Enter place">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="Description" class="form-control" placeholder="Enter descroption">
            </div>

            <label>Image</label>
            <div class="input-group">
                <div class="custon-file">
                    <input type="file" name="image" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <br/>
            <br/>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
            <br/>
            <a href="/lost" type="button" class="btn btn-success btn-block">View</a>
        </form>
    </div>
</div>
</body>
</html>



