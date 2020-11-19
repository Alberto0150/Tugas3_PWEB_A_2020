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

    </style>
</head>
<body style="width: 100%; height: auto;">
    <div class="flex-centered formContainer">
        <div class="card col-xl-7 customForm">
            <?php
                session_start();
                if (isset($_SESSION["sukses"]))
                {
                    echo '<div class="toast toast-success">';
                    echo '<button class="btn btn-clear float-right"></button>';
                    echo $_SESSION["sukses"];
                    echo '</div>';

                    unset($_SESSION["sukses"]);
                }
                if (isset($_SESSION["gagal"]))
                {
                    echo '<div class="toast toast-error">';
                    echo '<button class="btn btn-clear float-right"></button>';
                    echo $_SESSION["gagal"];
                    echo '</div>';

                    unset($_SESSION["gagal"]);
                }
            ?>
            <div class="flex-centered text-bold title">Masuk</div>
            <form method="POST" action="backend/loginFunction.php" onsubmit="return loginFormValidator(this)">
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-input" type="text" id="username" name="username" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-input" type="text" id="password" name="password" placeholder="Password"/>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                    <div class="flex-centered textBottom">
                        Belum memiliki akun? silahkan daftar <a href="/Tugas3_PWEB_A_2020/register.php">&nbsp;disini</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let loginFormValidator = (context) => {
            if(context.username.value == "" || context.password.value == ""){
                alert('Username dan password tidak boleh kosong');
                return false;
            }else {
                return true;
            }
        };
    </script>
</body>
</html>