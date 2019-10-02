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
    <h3 align="center" style="margin-left: 100px">LOST AND FOUND ITEMS</h3><br/>

    <div class="row">
        <div class="col-md-7" align="right">
            <h4></h4>
        </div>
        <div class="col-md-5" align="right">
            <a href="{{ url('Frepo/pdf') }}" class="btn btn-danger">Convert into PDF</a>
        </div>
    </div>
    <br/>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Item Type</th>
                <th>Place</th>
                <th>Description</th>
                <th>image</th>

            </tr>
            </thead>
            <tbody>
            @foreach($founditems_data as $found)
                <tr>
                    <td>{{ $found->itm_typ }}</td>
                    <td>{{ $found->place }}</td>
                    <td>{{ $found->discription }}</td>
                    <td><img src="{{asset('uploads/foundite/'.$found->image)}}" width="100px;" height="100px;"
                             alt="Image"></td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
