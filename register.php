<?php
    require './backend/dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            font-size: 5vh;
        }
        .textBottom {
            margin-top: 2%;
        }
        .invalid {
            color: red;
            margin-top: 2%;
        }
        .valid {
            color: green;
            margin-top: 2%;
        }
        .messages {
            margin-left: 4%;
            margin-right: 4%;
            margin-bottom: 4%;
            margin-bottom: 4%;
            padding: 4%;
        }
        .titleReq {
            font-size: 5vh;
            color: black;
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
                    <div id="retypeContainer" class="form-group" style="display: none">
                        <label class="form-label" for="retype">Retype Password</label>
                        <input class="form-input" type="text" id="retype" name="retype" placeholder="Retype Password"/>
                        <span id='message'></span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="daftar" style="display: none;">DAFTAR</button>
                    <div class="flex-centered textBottom">
                        Sudah memiliki akun? silahkan masuk <a href="/Tugas3_PWEB_A_2020/login.php">&nbsp;disini</a>
                    </div>
                </div>
            </form>
            <div id="message" class="bg-secondary messages">
                <div class="titleReq">Password must contain the following:</div>
                <div id="letter" class="invalid">A <b>lowercase</b> letter</div>
                <div id="capital" class="invalid">A <b>capital (uppercase)</b> letter</div>
                <div id="number" class="invalid">A <b>number</b></div>
                <div id="special" class="invalid">A <b>special</b> character</div>
            </div>
        </div>
    </div>
    <script>
        let password = document.getElementById('password');
        let pesan = document.getElementById('message');

        $(document).ready(function() {
            
            $('#password').on('keyup', function () {
                let nama = document.getElementById('nama');
                let username = document.getElementById('username');
                let retype = document.getElementById('retypeContainer');

                let letter = document.getElementById('letter');
                let number = document.getElementById('number');
                let capital = document.getElementById('capital');
                let special = document.getElementById('special');

                password.onkeyup = () => {
                    var lowerCaseLetters = /[a-z]/g;
                    if(password.value.match(lowerCaseLetters)) {
                        letter.classList.remove("invalid");
                        letter.classList.add("valid");
                    } else {
                        letter.classList.remove("valid");
                        letter.classList.add("invalid");
                    }

                    // Validate capital letters
                    var upperCaseLetters = /[A-Z]/g;
                    if(password.value.match(upperCaseLetters)) {
                        capital.classList.remove("invalid");
                        capital.classList.add("valid");
                    } else {
                        capital.classList.remove("valid");
                        capital.classList.add("invalid");
                    }

                    // Validate numbers
                    var numbers = /[0-9]/g;
                    if(password.value.match(numbers)) {
                        number.classList.remove("invalid");
                        number.classList.add("valid");
                    } else {
                        number.classList.remove("valid");
                        number.classList.add("invalid");
                    }

                    // validate special character
                    var specialChar = /[-!$%^&*()_+|~=`{}[:;<>?,.@#\]]/g;
                    if(password.value.match(specialChar)) {
                        special.classList.remove("invalid");
                        special.classList.add("valid");
                    } else {
                        special.classList.remove("valid");
                        special.classList.add("invalid");
                    }

                    if(password.value.match(lowerCaseLetters) &&
                    password.value.match(upperCaseLetters) &&
                    password.value.match(numbers) &&
                    password.value.match(specialChar)){
                        retype.style.display = 'block';
                    }else{
                        retype.style.display = 'none';
                    }
                }
            });

            if($('#password').val() != ""){
                document.getElementById('daftar').style.visibility = "block";
            }else {
                document.getElementById('daftar').style.visibility = "none";
            }
        });

        $('#password, #retype').on('keyup', function () {
        if (($('#password').val() == $('#retype').val()) && ($('#password').val() != "")) {
            document.getElementById('daftar').style.display = "block";
        } else 
            document.getElementById('daftar').style.display = "none";
        });
    </script>
</body>
</html>