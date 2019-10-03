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
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="#">Contact</a>
            <li><a href="#">About</a></li>
            <li><a href="#">Update</a></li>
            <li><a href="#">Search</a></li>

        </ul>
    </nav>
</div>

@extends('layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <h1>Utility Details</h1>
            <br>
            <br>
        </div>
        <div class="col-md-4">
            <form action="/search3" method="get">
                <div class="input-group">
                    <input type="search" name="search3" class="form-control">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-2 text-right">
            <a href="{{ action('utilitycontroller@create') }}" class="btn btn-primary">Add Data</a>
        </div>
    </div>
    <form method="post">
        @csrf
        @method('DELETE')
        <button formaction="/deleteall3" type="submit" class="btn btn-danger">Delete All Selected</button>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="230">ID</th>
                <th width="230">Type</th>
                <th width="230">Date</th>
                <th width="230">Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($utilities as $utility)
                <tr>
                    <td><input type="checkbox" name="ids[]" class="selectbox" value="{{ $utility->id}}"></td>
                    <td>{{ $utility->id }}</td>
                    <td>{{ $utility->type }}</td>
                    <td>{{ $utility->date }}</td>
                    <td>{{ $utility->amount }}</td>

                    <td>
                        <a href="{{ action('utilitycontroller@edit', $utility->id) }}"
                           class="btn btn-warning">UPDATE</a>
                        <button formaction="{{ action('utilitycontroller@destroy', $utility->id)}}" type="submit"
                                class="btn btn-danger">DELETE
                        </button>

                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>

        </table>
    </form>


    <script type="text/javascript">
        $('.selectall').click(function () {
            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selectall2').prop('checked', $(this).prop('checked'));
        });
        $('.selectall').click(function () {
            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selectall').prop('checked', $(this).prop('checked'));
        });
        $('.selectbox').change(function () {
            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if (total == number) {
                $('.selectall').prop('checked', true);
                $('.selectall2').prop('checked', true);
            } else {
                $('.selectall').prop('checked', false);
                $('.selectall2').prop('checked', false);
            }
        })

    </script>

@endsection
</body>
