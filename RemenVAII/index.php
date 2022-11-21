<?php
require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MMA SHOP |HOME</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <div class="navbar mob">
        <div class="logo">
            <img src="imgs/logo.png" width="125" alt="">
        </div>
                <li><a class="odkazy" href="dino.html">Hra</a></li>
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
<div class="container">
    <div class="row justify-content">
        <div class="col-12" style="padding-top: 20px">
            <h1>Trénuj v tom najkvalitnejšom!</h1>
            <p>Overená kvalita svetoznámymi zápasnikmi</p>
        </div>
        <div class="col-6 row align-items-center">
            <p>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/qblrPioCtBA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </p>
        </div>
        <div class="col-6">
            <img src="imgs/jiri.webp" alt="">
        </div>
    </div>
</div>
</body>
</html>