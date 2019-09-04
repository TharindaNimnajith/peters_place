<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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

    <form action="/search" method="get">
        <div class="row">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Search…">
                <span class="input-group-prepend"></span>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>

        </div>
    </form>


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
            <center><h2>Menus</h2></center>
            <table class="table table-hover table-dark">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Menu name</td>
                    <td>Menu type</td>
                    <td>Main Dishes</td>
                    <td>Salads</td>
                    <td>Desserts</td>
                    <td>beverages</td>
                    <td>price</td>
                    <td colspan=2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($menu as $emenu)
                    <tr>
                        <td>{{$emenu->id}}</td>
                        <td>{{$emenu->menu_name}}</td>
                        <td>{{$emenu->menu_type}}</td>
                        <td>{{$emenu->main_dishes}}</td>
                        <td>{{$emenu->salads}}</td>
                        <td>{{$emenu->deserts}}</td>
                        <td>{{$emenu->beverages}}</td>
                        <td>{{$emenu->price}}</td>
                        <td>
                            <a href="{{ route('menus.edit', $emenu->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('menus.destroy', $emenu->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div></div>
        </div>
        <!--MAIN SECTION-->
        <div>
            <a style="margin: 19px;" href="{{ route('menus.create')}}" class="btn btn-primary">New Menu</a>
        </div>

    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</div>
</body>
</html>
