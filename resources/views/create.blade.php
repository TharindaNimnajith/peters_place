<!doctype html>
<html>
<head><title>PetersPlace</title>
    <link href="{{ URL::asset('css/pay.css')}}" rel='stylesheet' media='all'/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div id="main">
    <nav>

        <ul style="display: inline-block">
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact</a>
            <li><a href="#">About</a></li>
            <li><a href="#">Update</a></li>
            <li><a href="#">Search</a></li>

        </ul>
    </nav>
</div>


@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>

                        @endforeach
                    </ul>

                </div>
            @endif
            <form action="{{action('postcontroller@store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" type="text" name="fname" placeholder="First Name"/>
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="lname" placeholder="Last Name"/>
                </div>
                <div class="form-group">
                    <label>NIC</label>
                    <input class="form-control" type="text" name="nic" placeholder="NIC"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Email"/>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" type="Number" name="phone" placeholder="Phone Number"/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" type="text" name="address" placeholder="Address"/>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>

            </form>
        </div>
    </div>
@endsection

</body>
