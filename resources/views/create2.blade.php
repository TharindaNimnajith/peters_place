<!doctype html>
<html>

<head>
    <title>PetersPlace</title>
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
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{action('utilitycontroller@store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Type</label>
                    <input class="form-control" type="text" name="type"/>
                </div>

                <div class="form-group">
                    <label>Date</label>
                    <input class="form-control" type="date" name="date"/>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input class="form-control" type="number" name="amount"/>
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>

            </form>
        </div>
    </div>
@endsection

</body>
