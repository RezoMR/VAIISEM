<?php

if(isset($_POST["submit"])) {
$email = $_POST["email"];
$psw = $_POST["psw"];
$uname = $_POST["uname"];
$pswRepeat = $_POST["pswRepeat"];


require_once "triedy/dbh.triedy.php";
require_once "triedy/Registracia.triedy.php";
require_once "triedy/RegistraciaContr.php";

$registracia = new RegistraciaContr($uname, $psw, $email);

$registracia->registraciaUser();

//----Navrat na hlavnu stranku-----//

header("location ../index.php");

}
