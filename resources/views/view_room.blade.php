<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Peter's Place || View Room Type</title>

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

<body id="viewbody">
<div class="model">
    <div class="model-dialog">
        <div class="model-content">
            <form method="post" class="form-control-static" id="viewform">
                {{ csrf_field() }}

                <div class="model-header">
                    <button type="button" class="close" data-dismiss="model" aria-hidden="true"
                            onclick="window.location='/room_management';">&times;</button>
                    <h4 class="model-title">View Room</h4>
                </div>

                <div class="model-body">
                    <div class="form-group">
                        <label>Room No</label>
                        <input type="text" name="r_no" class="form-control" value="{{ $details->id }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Room Type</label>

                        <select name="roomtype" class="form-control" disabled>
                            <option value="1">Single Bedroom</option>
                            <option value="2">Double Bedroom</option>
                            <option value="3">Family Bedroom</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Floor</label>

                        <select name="floor" class="form-control" disabled>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc" disabled></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Availability</label>

                                <div class="radio">
                                    <label><input type="radio" name="available" value="1" disabled>Available</label>
                                </div>

                                <div class="radio">
                                    <label><input type="radio" name="available" value="0" disabled>Not Available</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>

                                <div class="radio">
                                    <label><input type="radio" name="status_btn" value="1" disabled>Clean</label>
                                </div>

                                <div class="radio">
                                    <label><input type="radio" name="status_btn" value="0" disabled>Not Clean</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="model-footer">
                    <input type="button" class="btn btn-default" data-dismiss="model" value="Cancel"
                           onclick="window.location='/room_management';">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
