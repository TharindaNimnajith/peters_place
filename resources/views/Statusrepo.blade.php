<!DOCTYPE html>
<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <!--
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/home') }}">Home</a>
                </div>
            -->

        <ul class="nav navbar-nav" id="nav-topics">
            <li><a href="{{ url('/Frepo') }}">Lost and found items report</a></li>
            <li><a href="{{ url('/Srepo') }}">Housekeeping Report</a></li>
            <li><a href="{{ url('/Hrepo') }}">Tasks Report</a></li>
            <li><a href="{{ url('') }}"></a></li>

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

<br/>
<div class="container">
    <h3 align="center" style="margin-left: 100px">HOUSEKEEPING STATUS</h3><br/>

    <div class="row">
        <div class="col-md-7" align="right">
            <h4></h4>
        </div>
        <div class="col-md-5" align="right">
            <a href="{{ url('Srepo/pdf') }}" class="btn btn-danger">Convert into PDF</a>
        </div>
    </div>
    <br/>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Room Number</th>
                <th>floor</th>
                <th>Reservation Status</th>
                <th>Housekeeping Status</th>

            </tr>
            </thead>
            <tbody>
            @foreach($status_d as $stat)
                <tr>
                    <td>{{ $stat->id }}</td>
                    <td>{{ $stat->floor }}</td>
                    <td>

                        @if ($stat->availability == 1)
                            <label>Available</label>
                        @endif

                        @if ($stat->availability == 0)
                            <label>Not Available</label>
                        @endif
                    </td>
                    <td> @if ($stat->status == 1)
                            <label>Clean</label>
                        @endif

                        @if ($stat->status == 2)
                            <label>Not Clean</label>
                        @endif

                        @if ($stat->status == 3)
                            <label>Out of service</label>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
