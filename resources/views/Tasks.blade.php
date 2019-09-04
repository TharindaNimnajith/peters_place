<html>
<head>


    <title>Assign Tasks</title>

    <link href="css\Styleassign.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>


    </style>
</head>
<body>

@foreach($errors->all() as $error)

    <div class="alert alert-danger" role="alert">
        {{$error}}

    </div>

@endforeach


<div class="wrap-form" style="background-color:white;margin-left:300px;margin-right:350px;width:550px;height:90%">


    <form method="post" action="/saved">
        {{csrf_field()}}


        <span class="form-title">
						Assign tasks
					</span><br/><br/>

        Room Number: &nbsp <input type="text" name="RoomNo"><br/>

        Date: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="date" name="Date"><br/>

        Room Type: &nbsp; &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="RoomType"> <br/>

        Task: &nbsp;&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text" name="Task"><br/>

        Housekeeper:&nbsp;&nbsp&nbsp&nbsp&nbsp
        <input type="text" name="Housekeeper"><br/><br/>


        <input type="submit" value="Assign" name="btnSubmit" class="button">
    </form>
