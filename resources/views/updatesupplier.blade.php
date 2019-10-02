<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Update</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script>
        function formValidation() {
            var name = document.getElementById('name');
            var email = document.getElementById('email');
            var item = document.getElementById('item');
            var acc = document.getElementById('acc');
            // if (firstName.value.length == 0) {
            //     document.getElementById('firstName').innerText = " * All Fields are mandatory";
            //     firstName.focus();
            //     if (mName.value.length == 0) {
            //         document.getElementById('mName').innerText = " * All Fields are mandatory";
            //         mName.focus();
            //         if (age.value.length == 0) {
            //             document.getElementById('age').innerText = " * All Fields are mandatory";
            //             age.focus();
            //             return false;
            //         }
            //     }
            // }

            if (inputAlphabet(name, " * Please enter a valid name*", 'p1')) {
                if (emailValidation(email, " * Please enter a valid Email * ", 'p2')) {
                    if (itemValidation(item, " * Please enter a valid item*", 'p3')) {
                        if (AccValidation(acc, " * Please enter a valid account no. * ", 'p4')) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }

            } else {
                return false;
            }


            function inputAlphabet(inputtext, alertmsg, elem) {
                var alphaExp1 = /^[a-zA-Z]+$/;

                if (inputtext.value.match(alphaExp1)) {
                    return true;
                } else {
                    document.getElementById(elem).innerText = alertmsg;
                    inputtext.focus();
                    return false;
                }
            }

            function emailValidation(inputtext, alertmsg, elem) {

                var email = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                if (inputtext.value.match(email)) {

                    return true;
                } else {
                    document.getElementById(elem).innerText = alertmsg;
                    inputtext.focus();
                    return false;
                }
            }

            function itemValidation(inputtext, alertmsg, elem) {
                var alphaExp2 = /^[a-zA-Z]+$/;

                if (inputtext.value.match(alphaExp2)) {
                    return true;
                } else {
                    document.getElementById(elem).innerText = alertmsg;
                    inputtext.focus();
                    return false;
                }
            }


            function AccValidation(inputtext, alertmsg, elem) {
                var acc = /^[0-9]+$/;
                if ((inputtext.value.match(acc))) {
                    return true;
                } else {
                    document.getElementById(elem).innerText = alertmsg;
                    inputtext.focus();
                    return false;
                }
            }
        }

    </script>
    <!-- Styles -->
    <style>

        body {
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 1px solid black;
            border-radius: 15px;
            width: auto;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            margin-top: 71px;
            margin-bottom: auto;
            background-color: #cc9900;
            margin-block-start: 38px;
        }

        #date {
            padding: 3px;
            width: 189px;
            margin-left: 41px;
        }

        #name {
            padding: 5px;
            width: auto;
            margin-left: 41px;
        }

        #email {
            padding: 5px;
            width: auto;
            margin-left: 41px;
        }

        #supType {
            padding: 6px;
            width: 189px;
            margin-left: 41px;
        }

        #acc {
            padding: 5px;
            width: auto;
            margin-left: 41px;
        }

        #bank {
            padding: 5px;
            width: 189px;
            margin-left: 41px;
        }

        #item {
            padding: 5px;
            width: auto;
            margin-left: 41px;
        }


        #button {
            width: 100px;
            height: 35px;
            border: 1px solid rgb(51, 51, 56);
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            cursor: pointer;
            margin-left: auto;
            margin-top: 19%;
        }

        #button:hover {
            background-color: rgb(39, 42, 201);
            color: rgb(255, 253, 253);
        }

        #button1 {
            width: 100px;
            height: 35px;
            border: 1px solid rgb(51, 51, 56);
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            cursor: pointer;
            margin-left: 57px;
            margin-top: 21px;
        }

        #button1:hover {
            background-color: rgb(39, 42, 201);
            color: rgb(255, 253, 253);
        }


        td {
            margin-left: 15%;
            margin-top: 7%;
            padding-bottom: 7px;
        }

        input {
            margin-left: auto;
            width: auto;
        }

        select {
            margin-left: auto;
            width: auto;
        }

        table {
            margin-left: 22px;
            margin-top: 7%;
            width: auto;

        }

        h5.topic {
            font-family: Impact, Charcoal, sans-serif;
            font-size: 26px;
            margin-top: 24px;
            margin-left: 36px;


        }

        #supT {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: auto;
        }

        .sup1 {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 18px;
            width: auto;
            margin-left: -22px;
            margin-right: 6px;
        }

        .inputT {
            width: auto;

        }

        .container {
            margin-left: 16px;

        }
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <form class="sup1" method="post" action="/supplier" style="background-color: #3495e3">
                @csrf
                {{csrf_field() }}
                <h5 class="topic">Create Suppliers</h5>
                <table class="table-responsive-sm" style="margin-left:15px">
                    <div class="data">
                        <tr>
                            <td>Supplier Name</td>
                            <td><input type="text" id="name" placeholder="Enter Name" name="suppName" required
                                       value="{{$supplier->name}}"></td>

                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" id="email" placeholder="Enter Email" name="email" required
                                       value="{{$supplier->email}}"></td>

                        </tr>
                        <tr>
                            <td>Supplier Type</td>
                            <td><select id="supType" name="suptype" required value="{{$supplier->type}}">
                                    <option value="food">Food</option>
                                    <option value="EventPro">Event Products</option>
                                    <option value="Infra">Infrastructure</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Item</td>
                            <td><input type="text" id="item" placeholder="Enter Item" name="item" required
                                       value="{{$supplier->item}}"></td>
                            <p id="p3"></p>
                        <tr>
                            <td>Inactive Date</td>
                            <td><input type="date" id="date" name="date" value="{{$supplier->inac_date}}"></td>
                        </tr>
                        <tr>
                            <td>Bank Name</td>
                            <td>
                                <select id="bank" name="bank" required value="{{$supplier->bank}}">
                                    <option value="sampath">Sampath Bank</option>
                                    <option value="peoples">Peoples' Bank</option>
                                    <option value="boc">BOC</option>
                                    <option value="nsb">NSB</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Bank Account No</td>
                            <td><input type="text" id="acc" placeholder="Enter Account No" name="accNo" required
                                       value="{{$supplier->acc_no}}"></td>
                            <p id="p4"></p>
                            <input type="hidden" name="id" value="{{$supplier->id}}"/>
                        </tr>


                        <tr>
                            <td>
                                <button class="btn btn-danger" id="button" value="goBtn" type="reset">Cancle</button>
                            </td>
                            <td>
                                <button class="btn btn-primary" id="button1" value="clearBtn" type="submit">Update
                                </button>
                            </td>
                        </tr>
                    </div>
                </table>
            </form>
        </div>

    </div>
</div>
</body>
</html>

