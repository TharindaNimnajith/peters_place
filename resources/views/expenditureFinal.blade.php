<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Supplier</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Styles -->
    <style>

        body {
            background-color: #a1cbef;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }

    </style>
</head>
<div class="topnav">
    <a href="/supplier">Suppliers</a>
    <a href="/orderFinal">Orders</a>
    <a class="active" href="/expenditureFinal">Reports</a>
</div>

<div class="container" style="margin-top:151px">

    <div class="row">
        <div class="col-sm-12 col-md-4">

            <h2>Expenditures</h2>

            <form method="post" action="/send" id="reused_form">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message" name="item"> Item Type:</label></br>
                        <select style="height:28px">
                            <option value="sampath">Food</option>
                            <option value="peoples">Event Products</option>
                            <option value="boc">Infrastructure</option>
                        </select></br></br>
                        <label for="email" name="amount">Expended Amount:</label>
                        <input type="text" style="width:175px" class="form-control" id="amount" name="amount" required>
                        </br>
                        <label for="date" name="o_date"> Ordered Date:</label></br>
                        <input type="date" id="date" style="height:32px" name="date">
                        </br></br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <button type="submit" style="margin-left: 71px " class="btn btn-primary">Send</button>
                    </div>
                    <div class="col-sm-6 form-group">
                        <button type="submit" class="btn btn-warning" style="margin-left: -24px">Clear</button>
                    </div>
                </div>

            </form>

        </div>


        <div class="col-sm-12 col-md-8">
            <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger"
               style="margin-left: 473px;margin-bottom: -75px;margin-top: -123px">Convert into PDF </a>
            <table id="supT" class="table table-dark" style="margin-left: 15px;">
                <th class="sup1" scope="col">Type</th>
                <th class="sup1" scope="col">Name</th>
                <th class="sup1" scope="col">Email</th>
                @foreach( $expend as $ex)
                    <tr>
                        <td class="sup1">{{$ex ->type}}</td>
                        <td class="sup1">{{$ex ->amount}}</td>
                        <td class="sup1">{{$ex ->date}}</td>

                        <td class="sup1"><a href="{{route('expenditureFinal.edit',$ex -> id)}}" class="btn btn-success"
                                            value="goBtn">Update</a></td>
                        <td class="sup1">
                            <form id=delete action="{{route('expenditureFinal.destroy',$ex -> id)}}" method="post"
                                  style="margin-top: 0px;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach


            </table>
        </div>
    </div>
</div>
</div>
</div>
</body>

</html>
