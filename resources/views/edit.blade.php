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
            @foreach($posts as $post)
                <form action="{{ action('postcontroller@update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="fname" value="{{ $post->fname}}">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="lname" value="{{ $post->lname}}">
                    </div>
                    <div class="form-group">
                        <label>NIC</label>
                        <input class="form-control" type="text" name="nic" value="{{ $post->nic}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" name="email" value="{{ $post->email}}">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" type="Number" name="phone" value="{{ $post->phone}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address" value="{{ $post->address}}">
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ action('postcontroller@index') }}" class="btn btn-default">Back</a>
                </form>
            @endforeach
        </div>
    </div>
@endsection

</body>
