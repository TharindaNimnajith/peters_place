<html>

<head>
    <style type="text/css">
        .center {
            text-align: center;

        }

        .avatar {
            vertical-align: middle;
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }

        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 15px;
        }

    </style>
</head>

<body>
<div class="center">
    <a href="{{ asset ('uploads/appsetting/'.$row->image) }}"> Profile Picture</a>
    <h3>Employee ID:-{{$row->id}}</h3>
    <table>
        <tr>
            <td>Category</td>
            <td>{{$row->type}}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{$row->name}}</td>
        </tr>
        <tr>
            <td>Date Of Birth</td>
            <td>{{$row->DOB}}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{$row->gender}}</td>
        </tr>
        <tr>
            <td>Join Date</td>
            <td>{{$row->joindate}}</td>
        </tr>
        <tr>
            <td>Telephone No</td>
            <td>{{$row->tp}}</td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td>{{$row->Email}}</td>
        </tr>

    </table>
</div>


</body>

</html>
