<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="container">
</div>
<br>
<!--MAIN SECTION-->
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

<span style="font-size:20px;cursor:pointer; padding-top: 200px " onclick="openNav()">&#9776;Navigation Panel</span>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<div class="row">
    <div class="col-sm-12">
        <br>

        <center><h2>Event Report</h2></center>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br/>
        @endif
        <form method="post" action="{{ route('freport.update', $eventreport->id) }}">
            @method('PATCH')
            @csrf
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" colspan="4" style="color:blue;">Customer Information</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Customer name</td>
                    <td><input type="text" name="c_name" value={{ $eventreport->c_name }}></td>
                    <td>Event date</td>
                    <td><input type="text" name="event_date" value={{ $eventreport->event_date }}></td>
                <tr>
                    <td>Event time</td>
                    <td><input type="time" name="time" value={{ $eventreport->time }}></td>
                    <td>Category</td>
                    <td><input type="text" name="category" value={{ $eventreport->category }}></td>
                </tr>
                </tr>
                <tr>

                    <td>No. of Guests</td>
                    <td><input type="text" name="guests" value={{ $eventreport->guests }} ></td>
                    <td>Menu ID</td>
                    <td><input type="text" name="mid" value={{ $eventreport->mid }} ></td>

                </tr>
                <tr>
                    <th colspan="4" style="color:blue;">Payment Information</th>
                </tr>
                <tr>

                    <td colspan="2">Advancement</td>
                    <td><input type="text" name="advance" value={{ $eventreport->advance }}></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="2">Total Payment</td>
                    <td><input type="text" name="total" value={{ $eventreport->total }}></td>
                    <td></td>

                </tr>

                </tbody>

            </table>
            <input type="submit" value="Update" name="" class="btn btn-success"/>

        </form>

    </div>
    <!--MAIN SECTION-->


</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</div>
<br>

</body>
</html>
