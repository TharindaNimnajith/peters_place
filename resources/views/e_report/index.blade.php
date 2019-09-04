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
</head>
<body>

<br>
<br>
<br>
<div class="container">


</div>
<div role="group" aria-label="Basic example" class="btn btn-dark">
    <a href="{{ route('events.index')}}">
        <button class="btn btn-dark">Events</button>
    </a>
    <a href="{{ route('menus.index')}}">
        <button class="btn btn-dark">Menus</button>
    </a>
    <a href="/eitems">
        <button class="btn btn-dark">Event Items</button>
    </a>
    <a href="/estaff">
        <button class="btn btn-dark">Manage Staff</button>
    </a>
    <a href="/ereport">
        <button class="btn btn-dark">Report</button>
    </a>

</div>


<!--MAIN SECTION-->


<div class="row">
    <div class="col-sm-12">
        <br>
        <br>
        <br>
        <br>
        <center><h2>Event Management Report</h2></center>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" colspan="4" style="color:blue;">Event Information</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Event name</td>
                <td><input type="text" name="event_name"/></td>
                <td>Event date</td>
                <td><input type="text" name="event_date"/></td>
            <tr>
                <td>Event time</td>
                <td><input type="text" name="event_time"/></td>
                <td>Event Manager</td>
                <td><input type="text" name="event_manager"/></td>
            </tr>
            </tr>
            <tr>

                <td>Estimated No. of Attendence of guest for the Event</td>
                <td><input type="text" name="attendence"/></td>
                <td>Proposed Registration cost for a each person</td>
                <td><input type="text" name="R_cost"/></td>

            </tr>
            <tr>
                <th colspan="4" style="color:blue;">Budget Information</th>
            </tr>
            <tr>
                <th scope="row" colspan="2">Expence category</th>
                <th scope="row">Budget expence</th>
                <th scope="row">Actual expence</th>

            </tr>
            <tr>
                <td colspan="2"><input type="text" name="date"/></td>
                <td><input type="text" name="date"/></td>
                <td><input type="text" name="date"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="date"/></td>
                <td><input type="text" name="date"/></td>
                <td><input type="text" name="date"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="date"/></td>
                <td><input type="text" name="date"/></td>
                <td><input type="text" name="date"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="date"/></td>
                <td><input type="text" name="date"/></td>
                <td><input type="text" name="date"/></td>
            </tr>
            <tr>
                <td colspan="2">Total</td>
                <td><input type="text" name="date"/></td>
                <td><input type="text" name="date"/></td>
            </tr>

            </tbody>

        </table>
        <input type="submit" value="Save" name="savereport" class="btn btn-success"/>
    </div>
    <!--MAIN SECTION-->


</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>

