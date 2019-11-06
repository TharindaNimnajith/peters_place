<html>
<head>
    @extends('layouts.my')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="{{ URL::asset('js/jquery.printPage.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-2.2.4.min.js') }}"></script>

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

<!--header end-->


<!-- add new -->

</div>
<a href="/vie2" type="button" class="btn btn-success" style="margin-left: 1150px">
    <i class="material-icons">&#xE147;</i>
    <span>Add New Task</span>
</a>
</div>

<!-- add new -->


<div class="container">
    <div class="text-center">
        <h2>Work Orders</h2> <br/>
    </div>
</div>


<table class="table table-hover table-bordered" style="width:1280px ; margin-left: 30px">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Task</th>
        <th scope="col">RoomNo</th>
        <th scope="col">RoomType</th>
        <th scope="col">Housekeeper</th>
        <th scope="col">Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>


    @foreach($AssingTask as $task)

        <tbody>
        <tr>
            <td>{{$task->Task}}</td>
            <td> {{$task->RoomNo}}</td>
            <td>{{$task->RoomType}}</td>
            <td>{{$task->Housekeeper}}</td>
            <td>{{$task->Date}}</td>


            <td>

                <a href="/deletetask/{{$task->id}}" class="btn btn-danger">Delete</a>


            </td>

        </tr>


        @endforeach


        </tbody>
</table>
</div>
</div>
</span>
</span>

<a href="{{ url('/prnpriview') }}" class="btnprn btn-primary btn-lg" style="margin-left:1200px">Print List </a>
<script type="text/javascript">
    $(document).ready(function () {
        $('.btnprn').printPage();
    });
</script>


</body>
</html>

