<html>
<head>


    <title>Found Items</title>

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


<!-- add new -->

</div>
<a href="/found" type="button" class="btn btn-success" style="margin-left: 1100px">
    <i class="material-icons">&#xE147;</i>
    <span>Add New Item</span>
</a>
</div>

<!-- add new -->


<div class="container">
    <div class="text-center" style="margin-left:500px">
        <h2>Lost and Found Items</h2> <br/>
    </div>
</div>


<span class="limiter">
        <span class="container-table100">

            <div class="wrap-table100">
                <div class="table100">
                    <table id="datatable">
 {{csrf_field()}}

                       <table class="table table-hover table-bordered" style="width:1280px ; margin-left: 40px">
        <thead class="thead-dark">
        <tr>

            <th scope="col">Item Type</th>
            <th scope="col">Place</th>
            <th scope="col">Description</th>

            <th scope="col">Image</th>
            <th scope="col">Action</th>

        </tr>
        </thead>


                           @foreach($lf as $stat)

                               <tbody>
                            <tr>

                                <td>{{$stat->itm_typ}}</td>
                                <td> {{$stat->place}}</td>
                                <td>{{$stat->discription}}</td>
                                <td><img src="{{asset('uploads/foundite/'.$stat->image)}}" width="100px;"
                                         height="100px;" alt="Image"></td>





                                <td>

                <a href="/deleteItem/{{$stat->id}}" class="btn btn-danger">Delete</a>


                                </td>
                                                       </tr>



                @endforeach



                            </tbody>
                    </table>
                    </table>
                </div>
            </div>
        </span>
</span>


</body>
</html>
