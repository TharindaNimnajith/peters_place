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
        <div class="col-sm-8 offset-sm-2">
            <br>
            <br>
            <br>
            <center><h2>Add a Menu List</h2></center>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <form method="post" action="{{ route('menus.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="menu_name">Menu name</label>
                        <input type="text" class="form-control" name="menu_name"/>

                    </div>

                    <div class="form-group">
                        <label for="menu_type">Menu Type</label>
                        <select name="menu_type" class="form-control">

                            <option value="1">Choose</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Client">Client</option>
                            <option value="Other">Other</option>


                        </select>

                    </div>

                    <div class="form-group">
                        <label for="main_dishes">Main Dishes</label>
                        <textarea type="text" class="form-control" name="main_dishes" rows="5" required=""
                                  style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="salads">Salads</label>
                        <textarea type="text" class="form-control" name="salads" rows="5" required=""
                                  style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="deserts">Desserts</label>
                        <textarea type="text" class="form-control" name="deserts" rows="5" required=""
                                  style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="beverages">Beverages</label>
                        <textarea type="text" class="form-control" name="beverages" rows="5" required=""
                                  style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price"/>
                    </div>

                    <button type="submit" class="btn btn-success">Add Menu</button>
                </form>
            </div>
        </div>
    </div>
    <!--MAIN SECTION-->

</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>

