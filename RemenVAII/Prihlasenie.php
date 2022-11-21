<?php
require "config.php";
if(isset($_POST["submit"])) {
    $psw = $_POST['psw'];
    $uname = $_POST['uname'];

    /** @var TYPE_NAME $connect */
    $select = "SELECT * FROM users WHERE users_uname = '$uname'";
    $result = mysqli_query($connect, $select);
    $num = mysqli_num_rows($result);
    if ($num <= 0) {
    echo "Username neexistuje, zaregistrujte sa";
    } else {
        $heslo = "SELECT *  FROM users WHERE users_uname = '$uname' AND users_psw = '$psw'";
        $result = mysqli_query($connect, $heslo);
        if ($result) {
            $num=mysqli_num_rows($result);
            if($num>0) {
                $_SESSION['uname'] = $uname;
                header("location: index.php");
            }
        }
    }


}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Prihlasenie</title>
    <link rel="stylesheet" href="CSS/PrihlasenieStyles.css">
    <script src="js/login.js"></script>
</head>
<body style="background-image: url(imgs/arena.jpg)">
<style>
    .btn {
        background-color: green;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>
<form method="post">
<div class="login-form">
    <form>
        <h1>Login</h1>
        <div class="content">
            <div class="input-field">
                <label for="uname">
                    <input type="text" class="input" name="uname" placeholder="USERNAME" required/>
                </label>
            </div>
            <div class="input-field">
                <label for="psw">
                    <input type="password" class="input"  name="psw" placeholder="PASSWORD" required/>
                </label>
            </div>
            <a href="ZabHeslo.php" class="link">Zabudli ste heslo?</a>
            <p></p>
            <p></p>
                <a href="Registracia.php">Nemáte účet?</a>

        </div>
        <div>
            <input class="btn" name="submit" type="submit" value="Login" onclick="validate()" >

        </div>

    </form>
</div>
</body>
</html>

