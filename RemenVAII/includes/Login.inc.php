<?php

if (isset($_POST["submit"])) {
    $psw = $_POST["psw"];
    $uname = $_POST["uname"];

//includes
    include "../triedy/dbh.triedy.php";
    include "../triedy/login.triedy.php";
    include "../triedy/LoginContr.php";

    $login = new LoginContr($uname, $psw);

    $login->loginUser();

    //----Navrat na hlavnu stranku-----//
    header("location index.php?error=none");

}