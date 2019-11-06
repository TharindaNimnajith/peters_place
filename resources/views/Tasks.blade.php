<html>
<head>


    <title>Assign Tasks</title>

    <!-- header style-->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>

    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet"/>


    <!-- header style-->


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


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


<div class="wrap-form" style="background-color:white;margin-left:300px;margin-right:350px;width:550px;height:90%">


    <form method="post" action="/saved">

        <div class="container">
            <div class="text-center">
                <h1 style="margin-left:200px;">Assign Task</h1> <br/>
            </div>
        </div>


        <div class="container" style="width:800px">
            <div class="jumbotron">
                <form method="post" action="/saved">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label> Room Number: </label>
                        <select class="form-control" name="RoomNo">
                            <option></option>
                            <option>100</option>
                            <option>200</option>
                            <option>300</option>
                            <option>400</option>
                            <option>500</option>
                            <option>600</option>
                            <option>700</option>
                            <option>800</option>
                            <option>900</option>
                            <option>1000</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Date:</label>
                        <input type="Date" name="Date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Room Type:</label>
                        <select class="form-control" name="RoomType" placeholder="Enter Room Type">
                            <option></option>
                            <option>Single Room</option>
                            <option>Double Room</option>
                            <option>Twin Room</option>
                            <option>Interconnecting Rooms</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Task:</label>
                        <input type="text" name="Task" class="form-control" placeholder="">
                    </div>


                    <div class="form-group">
                        <label>Housekeeper</label>
                        <input type="text" name="Housekeeper" class="form-control" placeholder="">
                    </div>
                    <br/>
                    <br/>

                    <input type="submit" value="Assign" name="btnSubmit" class="btn btn-primary btn-block">
                    <a href="/vie" type="button" class="btn btn-success btn-block">View</a>


                </form>

            </div>
        </div>
</div>
</body>
</html>



