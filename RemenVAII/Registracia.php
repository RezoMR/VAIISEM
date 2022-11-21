<?php
require "config.php";

if(isset($_POST["submit"])) {
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $uname = $_POST['uname'];
    $pswRepeat = $_POST['pswRepeat'];


    if (empty($_POST['uname']) || empty($_POST['psw']) || empty($_POST['email']) || empty($_POST['pswRepeat'])) {
        // One or more values are empty.
        echo('Vyplňte všetko');
    }

    /** @var TYPE_NAME $connect */

    $select = "SELECT * FROM users WHERE users_uname = '$uname'";
    $result = mysqli_query($connect, $select);
    $num = mysqli_num_rows($result);

    $selectem = "SELECT * FROM users WHERE users_email = '$email'";
    $resultem = mysqli_query($connect, $selectem);
    $numem = mysqli_num_rows($resultem);

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo('Email je neplatny');
    }
    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['uname']) == 0) {
        echo('Zadajte platne meno!');
    }
    if (strlen($_POST['psw']) > 20 || strlen($_POST['psw']) < 5) {
        echo('Heslo mat od 5 do 20 znakov!');
    }

    if ($num > 0 || $numem >0) {
        echo "Meno alebo email už niekto pouziva";
    } else {
        $query = "INSERT INTO users( users_uname, users_psw, users_email, meno, priezvisko, mesto, adresa) VALUES ('$uname','$psw','$email', '','','','')";
        mysqli_query($connect, $query);
        header("location: Prihlasenie.php");
    }

}
?>

<!DOCTYPE html>

<html lang="en">
<link rel="stylesheet" href="CSS/RegistraciaStyles.css">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   <title>Registracia</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body style="background-image: url(imgs/reg.jpg)">
<form method="post" action="" autocomplete="off">
    <style>
        body {
            background-image: url('imgs/reg.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
<div>
    <form>
        <h4>Zaregistrujte sa</h4>
        <label for="email">
            <input type="text" class="input" name="email" placeholder="EMAIL" required/>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label for="uname">
            <input type="text" class="input" name="uname" placeholder="USERNAME" required/>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label for="psw">
            <input type="password" class="input"  name="psw" placeholder="PASSWORD" required/>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label for="pswRepeat">
            <input type="password" class="input" name="pswRepeat" placeholder="CONFIRM PASSWORD" required/>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>

        <input name="submit" type="submit" value="Register">
    </form>
</div>
</body>
</html>