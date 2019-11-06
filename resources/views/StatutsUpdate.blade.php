<html>
<head>


    <title>Update Room Status</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  -->
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


<!--search-->


<div class="container">
    <div class="text-center">
        <h2>Room Status</h2> <br/>
    </div>
</div>

<div class="container">
    <div class="jumbotron" style="width: 600px; margin-left: 300px; height:200px">

        <form action="/searchH" method="get">
            {{csrf_field()}}


            <div class="form-group">

                <select class="form-control" name="search" required>
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

                </select>
                </br>

                <button type="submit" name="btnSearch" class="btn btn-primary btn-block">search</button>

            </div>

        </form>

        <br/><br/>

    </div>
</div>


<!--search-->

<!--

<div class="container">
<div class="form-check">
    <div class="jumbotron" style="margin-top:20px;width:400px;margin-left: 350px">
    <fieldset>



        <div class="foo b"></div>
        <input type="checkbox"checked="checked" name="ch1">Clean<br/><br/>
        <div class="foo p"></div>
        <input type="checkbox"checked="checked" name="ch2">Dirty<br/><br/>
        <div class="foo w"></div>
        <input type="checkbox"checked="checked" name="ch3">Out of Service<br/><br/>


    </fieldset>
    </form>
</div>
    </div>
    </div>
-->

<div class="container">
    <div class="text-center">
        <h2></h2> <br/>
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

            <th scope="col">Room</th>
            <th scope="col">Floor</th>
            <th scope="col">Reservation Status</th>

            <th scope="col">Room Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>



            @foreach($up as $stat)

                               <tbody>
                            <tr>

                                 <td>{{$stat->id}}</td>
                                <td> {{$stat->floor}}</td>


                                <td>
                                    @if ($stat->availability)
                                        <label>Available</label>


                                    @else
                                        <label>Not Available</label>
                                    @endif

                                    </td>

                                <td>
                                @if ($stat->status == 1)
                                        <label>Clean</label>
                                    @endif

                                    @if ($stat->status == 2)
                                        <label>Dirty</label>
                                    @endif

                                    @if ($stat->status == 3)
                                        <label>Out of service</label>
                                    @endif

                                </td>






                                <td>
                                    <a href="/upd/{{$stat->id}}" type="button" class="btn btn-success">Update</a>


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
