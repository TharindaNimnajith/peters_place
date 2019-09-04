<html>
<head>

    <title>Room Status List</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>


@foreach($errors->all() as $error)

    <div class="alert alert-danger" role="alert">
        {{$error}}

    </div>

@endforeach


<form action="/search" method="get">
    {{csrf_field()}}

    <h1>Housekeeping Status</h1><br/><br/>


    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form-group">
        <label>Room Number</label>
        <input type="search" name="search" class="form-control" placeholder="Enter Room Number" required>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


    <button type="submit" name="btnSearch" class="btn btn-primary">search</button>


</form>

<br/><br/>


<table class="table table-dark">
    <thead>
    <tr>

        <th scope="col">RoomNo</th>
        <th scope="col">RoomType</th>

        <th scope="col">Status</th>

    </tr>
    </thead>


    @foreach($sty as $stat)

        <tbody>
        <tr>
            <td>{{$stat->room_no}}</td>
            <td> {{$stat->floor}}</td>
            <td>{{$stat->status}}</td>


        </tr>


        @endforeach


        </tbody>
</table>
</div>
</div>
</span>
</span>


</body>
</html>



