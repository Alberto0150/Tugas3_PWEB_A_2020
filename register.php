<?php
    require './backend/dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .formContainer {
            margin: 0;
            margin-top: 5%;
        }
        .customForm {
            padding-left: 4%;
            padding-right: 4%;
            padding-top: 4%;
            padding-bottom: 4%;
            margin-bottom: 4%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .btn-primary {
            margin-top: 4%;
            width: 100%;
        }
        .title {
            font-size: 3vh;
        }
        .textBottom {
            margin-top: 2%;
        }
    </style>
</head>
<body style="width: 100%; height: auto;">
    <div class="flex-centered formContainer">
        <div class="card col-xl-7 customForm">
            <div class="flex-centered text-bold title">Daftar</div>
            <form method="POST" action="backend/registerFunction.php">
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input class="form-input" type="text" id="nama" name="nama" placeholder="Nama Lengkap"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-input" type="text" id="username" name="username" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-input" type="text" id="password" name="password" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="retype">Retype Password</label>
                        <input class="form-input" type="text" id="retype" name="retype" placeholder="Retype Password"/>
                        <span id='message'></span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="daftar">DAFTAR</button>
                    <div class="flex-centered textBottom">
                        Sudah memiliki akun? silahkan masuk <a href="/Tugas3_PWEB_A_2020/login.php">&nbsp;disini</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            if($('#password').val() != ""){
                document.getElementById('daftar').style.visibility = "visible";
            }else {
                document.getElementById('daftar').style.visibility = "hidden";
            }
        });

        $('#password, #retype').on('keyup', function () {
        if (($('#password').val() == $('#retype').val()) && ($('#password').val() != "")) {
            document.getElementById('daftar').style.visibility = "visible";
        } else 
            document.getElementById('daftar').style.visibility = "hidden";
        });
    </script>
</body>
</html>