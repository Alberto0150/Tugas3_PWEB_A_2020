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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
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
            <form method="POST" action="backend/uploadImage.php" role="form" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-input" type="text" id="username" name="username" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="file">Foto</label>
                        <input class="form-input" type="file" id="file" name="file" placeholder="File Foto"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-input" type="text" id="password" name="password" placeholder="Password"/>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="daftar">DAFTAR</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>