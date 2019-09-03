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
            @foreach($accoms as $accom)
                <form action="{{ action('accomcontroller@update', $accom->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Arrival</label>
                        <input class="form-control" type="date" name="arrival_date" value="{{ $accom->arrival_date}}">
                    </div>

                    <div class="form-group">
                        <label>Departure</label>
                        <input class="form-control" type="date" name="deparure_date" value="{{ $accom->deparure_date}}">
                    </div>
                    <div class="form-group">
                        <label>Adults</label>
                        <input class="form-control" type="Number" name="adults" value="{{ $accom->adults}}">
                    </div>
                    <div class="form-group">
                        <label>Kids</label>
                        <input class="form-control" type="Number" name="kids" value="{{ $accom->kids}}">
                    </div>
                    <div class="form-group">
                        <label>Room Type</label>
                        <input class="form-control" type="text" name="room_type" value="{{ $accom->room_type}}">
                    </div>
                    <div class="form-group">
                        <label>Room No</label>
                        <input class="form-control" type="text" name="room_no" value="{{ $accom->room_no}}">
                    </div>
                    <div class="form-group">
                        <label>Food Service</label>
                        <input class="form-control" type="text" name="food_ser" value="{{ $accom->food_ser}}">
                    </div>
                    <div class="form-group">
                        <label>Payment</label>
                        <input class="form-control" type="text" name="payment" value="{{ $accom->payment}}">
                    </div>
                    <div class="form-group">
                        <label>NIC</label>
                        <input class="form-control" type="text" name="nic" value="{{ $accom->nic}}">
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ action('accomcontroller@index') }}" class="btn btn-default">Back</a>
                </form>
            @endforeach
        </div>
    </div>
@endsection

</body>
