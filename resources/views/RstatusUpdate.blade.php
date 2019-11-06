<html lange="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Task</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<br/>
<br/>
<br/>


<div class="container">

    <form method="POST" action="/newone">
    {{csrf_field()}}



    <!-- <input type="text" class="form-control" name="status" value="" required/>  -->

        <div class="form-group">
            <label>Room Status</label>
            <select class="form-control" name="status" required/>
            <option value="1" @if ($statusdata->status == '1') selected @endif>Clean</option>
            <option value="2" @if ($statusdata->status == '2') selected @endif>Dirty</option>
            <option value="3" @if ($statusdata->status == '3') selected @endif>Out Of Service</option>
            </select>
        </div>


        <input type="hidden" name="id" value="{{$statusdata->id}}"/>

        <br/>
        <br/>


        <input type="submit" class="btn btn-warning" value="Update"/>

        <a href="/Update" type="button" class="btn btn-success">Cancel</a>

    </form>


</div>
</body>
</html>

