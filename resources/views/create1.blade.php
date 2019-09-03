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
            <form action="{{action('accomcontroller@store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Arrival</label>
                    <input class="form-control" type="date" name="arrival_date">
                </div>

                <div class="form-group">
                    <label>Departure</label>
                    <input class="form-control" type="date" name="deparure_date">
                </div>
                <div class="form-group">
                    <label>Adults</label>
                    <input class="form-control" type="Number" name="adults">
                </div>
                <div class="form-group">
                    <label>Kids</label>
                    <input class="form-control" type="Number" name="kids">
                </div>
                <div class="form-group">
                    <label>Room Type</label>
                    <select style="margin-left: 0px; margin-bottom: 30px" class="form-control" type="text"
                            name="room_type">
                        <option value="single">Single Bedroom</option>
                        <option value="double">Double Bedroom</option>
                        <option value="family">Family Bedroom</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Room No</label>
                    <input class="form-control" type="text" name="room_no">
                </div>
                <div class="form-group">
                    <label>Food Service</label>
                    <select style="margin-left: 0px; margin-bottom: 30px" class="form-control" type="text"
                            name="food_ser">
                        <option value="breakfast">Breakfast</option>
                        <option value="half">Half Board</option>
                        <option value="full">Full Board</option>
                    </select>

                </div>
                <div class="form-group">
                    <label>Payment</label>
                    <input class="form-control" type="text" name="payment">
                </div>
                <div class="form-group">
                    <label>NIC</label>
                    <input class="form-control" type="text" name="nic">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>

            </form>
        </div>
    </div>
@endsection

</body>
