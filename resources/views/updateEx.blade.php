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

</head>

<div class="container" style="margin-top:151px">

    <div class="row">
        <div class="col-sm-12 col-md-4">

            <h2>Expenditures</h2>

            <form method="post" action="/save" id="reused_form">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message" name="item"> Item Type:</label></br>
                        <select style="height:28px" name="item">
                            <option value="food">Food</option>
                            <option value="event">Event Products</option>
                            <option value="infa">Infrastructure</option>
                        </select></br></br>
                        <label for="email" name="amount"> Amount:</label>
                        <input type="text" style="width:175px" class="form-control" id="amount" name="amount" required>
                        </br>
                        <label for="date" name="o_date"> Ordering Date:</label></br>
                        <input type="date" id="date" style="height:32px" name="date">
                        </br></br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <button type="reset" class="btn btn-warning" style="margin-left: 60px">Clear</button>

                    </div>
                    <div class="col-sm-6 form-group">
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
                </div>

            </form>

        </div>

    </div>
</div>
</div>
</div>
</body>
</html>
