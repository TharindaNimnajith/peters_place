<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {

            padding: 8px 18px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 16px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

    </style>


</head>


<body>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <h1 style="padding-left: 29px"> Click here to continue </h1>
    <br>
    <br>
    <a href="/customer">Customer Details</a>
    <a href="/accoms">Accommodation Details</a>
    <a href="/events1">Event Details</a>
    <a href="/freport">Reports</a>

</div>
<br>

<span style="font-size:20px;cursor:pointer; padding-top: 200px " onclick="openNav()">&#9776;Navigation Panel</span>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<div class="container">


    <!--MAIN SECTION-->


    <div class="row">
        <div class="col-sm-12">
            <center><h2>Event Report</h2></center>
            <table class="table table-bordered">
                <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Category</th>
                    <th>No. of Guests</th>
                    <th>Menu ID</th>
                    <th>Advancement</th>
                    <th>Total Payment</th>
                    <th colspan="2">Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($eventreport as $report)
                    <tr>
                        <td>{{$report->id}}</td>
                        <td>{{$report->c_name}}</td>
                        <td>{{$report->event_date}}</td>
                        <td>{{$report->time}}</td>
                        <td>{{$report->category}}</td>
                        <td>{{$report->guests}}</td>
                        <td>{{$report->mid}}</td>
                        <td>{{$report->advance}}</td>
                        <td>{{$report->total}}</td>


                        <td>
                            <a href="{{ route('freport.edit', $report->id)}}" class="btn btn-primary">View</a>
                        </td>
                        <td>

                            <form action="{{ route('freport.destroy', $report->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
            <!--MAIN SECTION-->

            <div>
                <a style="margin: 19px;" href="{{ route('freport.create')}}" class="btn btn-primary">New Event
                    Report</a>
                <a href="{{url('f_report/edit/pdf')}}" class="btn btn-danger">Convert into PDF</a>

            </div>


        </div>

    </div>
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
