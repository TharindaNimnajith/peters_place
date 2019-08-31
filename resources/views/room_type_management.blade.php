<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Peter's Place || Room Type Management</title>

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

    <script>
        $(document).ready(function () {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
<div class="container">
    <div class="navigation">
        @if (session() -> has('success'))
            <div class="alert alert-success">
                {{ session() -> get('success') }}
            </div>
        @endif

        @if ($errors -> any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors -> all() as $error)
                        <li>{{ $error }}</li>
                </ul>
                    @endforeach
            </div>
        @endif

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!--
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/home') }}">Home</a>
                </div>
                -->

                <ul class="nav navbar-nav" id="nav-topics">
                    <li><a href="{{ url('/room_management') }}">Rooms</a></li>
                    <li class="active"><a href="#">Room Types</a></li>
                    <li><a href="{{ url('/room_reservation_management') }}">Room Reservations</a></li>
                    <li><a href="{{ url('/room_reports') }}">Reports</a></li>
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

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="room_mngmnt">
                        <a href="{{ url('/room_type_management') }}">Room Type <b>Management</b></a>
                    </h2>
                </div>

                <div class="col-sm-3">
                    <div class="search-box">
                        <a href="#searchRoomTypeModal" class="search" data-toggle="modal">
                            <img src="{{ asset('images/search_bar.png') }}" alt="search_icon">
                        </a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <a href="#addRoomTypeModal" class="btn btn-success" data-toggle="modal">
                        <i class="material-icons">&#xE147;</i>
                        <span>Add New Room Type</span>
                    </a>
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Type ID</th>
                <th>Name</th>
                <th>Base Price (LKR)</th>
                <th>Total Room Count</th>
                <th>Available Room Count</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($room_types as $room_type)
            <tr>
                <td>{{ $room_type -> t_id }}</td>
                <td>{{ $room_type -> name }}</td>
                <td>{{ $room_type -> base_price }}</td>
                <td></td>
                <td></td>

                <td>
                    <a href="#viewRoomTypeModal" class="view" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="View">&#xE417;</i>
                    </a>

                    <a href="#editRoomTypeModal" class="edit" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>

                    <a href="#deleteRoomTypeModal" class="delete" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>
                </td>
            </tr>
            @endforeach 
            </tbody>
        </table>

        <div class="clearfix"></div>
    </div>
</div>

<!-- Add Modal HTML -->
<div id="addRoomTypeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/add_room_type">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title">Add New Room Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Room Type ID</label>
                        <input type="text" name="t_id" class="form-control" value="{{ old('t_id') }}">
                    </div>

                    <div class="form-group">
                        <label>Room Type Name</label>
                        <input type="text" name="t_name" class="form-control" value="{{ old('t_name') }}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc">{{ old('desc') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Base Price (LKR)</label>
                        <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="editRoomTypeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/edit_room_type">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title">Edit Room Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Room Type ID</label>
                        <input type="text" name="t_id" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Room Type Name</label>
                        <input type="text" name="t_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Base Price (LKR)</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Modal HTML -->
<div id="viewRoomTypeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/view_room_type">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title">View Room Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Room Type ID</label>
                        <input type="text" name="t_id" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Room Type Name</label>
                        <input type="text" name="t_name" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc" disabled></textarea>
                    </div>

                    <div class="form-group">
                        <label>Base Price (LKR)</label>
                        <input type="text" name="price" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Total Room Count</label>
                        <input type="text" name="tot" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Available Room Count</label>
                        <input type="text" name="av_cnt" class="form-control" disabled>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Search Modal HTML -->
<div id="searchRoomTypeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/search_room_type">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title">Search Room Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Room Type ID</label>
                        <input type="text" name="t_id" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Room Type Name</label>
                        <input type="text" name="t_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Availability</label>

                        <div class="radio">
                            <label><input type="radio" name="available" value="1">Available</label>
                        </div>

                        <div class="radio">
                            <label><input type="radio" name="available" value="0">Not Available</label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Search">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteRoomTypeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/delete_room_type">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title">Delete Room Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to delete this Record?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
