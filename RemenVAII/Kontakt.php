<?php
require "config.php";

if(isset($_POST["submit"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $telcis = $_POST['telcis'];
    $email = $_POST['email'];
    $subject =$_POST['subject'];

    $predmet = "Sprava od zakaznika";
    $mailto = "nemer.sutam@gmail.com";
    $headers = "From: " .$email;
    $txt = "You have received an email from " .$fname. ".\n\n". $subject;
    mail($mailto, $predmet ,$txt, $headers);
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kontakt</title>
    <link rel="stylesheet" href="CSS/KontaktStyles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="background-image: url(imgs/oktagon.jpg)">
<style>
    body {
        background-image: url('imgs/oktagon.jpg');
        background-repeat: no-repeat;
        background-size: 100%;
    }
</style>

<!-- Horná lišta----------------------------------------------------------------------------- -->
<div class="container">
    <div class="navbar mob">
        <div class="logo">
            <img src="imgs/logo.png" width="125" alt="">
        </div>
        <li><a class="odkazy" href="index.php">Home</a></li>
        <li><a class="odkazy" href="Blog.html">Blog</a></li>
        <li><a class="odkazy" href="Shop.html">Shop</a></li>
        <li><a class="odkazy" href="Kontakt.php">Kontakt</a></li>
        <?php
        if(isset($_SESSION["uname"])) {
            ?>
            <li><a class="odkazy" href="profile.php">Profile</a></li>
            <li><a class="odkazy" href="includes/logout.inc.php" >Logout</a></li>
            <?php
        }
        else {
            ?>
            <li><a class="odkazy" href="Prihlasenie.php">LOGIN</a></li>
            <?php
        }

        ?>

        </nav>
    </div>
</div>
<!-- Koniec Horná lišta------------------------------------------------------------------------- -->

<form method="post">
<div class="container kontaktpozadie">

    <label for="fname">Meno</label>
    <input type="text" id="fname" name="fname" required placeholder="Vaše Meno" >

    <label for="lname">Priezvisko</label>
    <input type="text" id="lname" name="lname" required placeholder="Vaše Priezvisko">

    <label for="lname">Telefónne číslo</label>
    <input type="text" id="telcis" name="telcis" required placeholder="Vaše telefónne číslo">

    <label for="email">Email</label>
    <input type="text" id="email" name="email" required placeholder="Váš Email">

    <label for="subject">Predmet</label>
    <textarea id="subject" name="subject" placeholder="Napíšte nám" style="height:200px"></textarea>

    <input type="submit" name="submit" value="Odoslať">


</div>
</form>
</body>
</html>