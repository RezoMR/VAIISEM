<?php
require "config.php";
/** @var TYPE_NAME $connect */
if(isset($_POST["cancel"])) {
    header("location: index.php");
}
if(isset($_POST["delete"])) {
    $psw = $_POST['psw'];
    $uname = $_POST['uname'];
       if (empty($_POST['psw'])) {
        echo('Zadajte heslo pre vymazanie');
    }
    if (empty($_POST['uname'])) {
        echo('Zadajte meno pre vymazanie');
    }
  $delete = "DELETE FROM users WHERE users_psw = '$psw' AND users_psw = '$uname' ";
//    $result = mysqli_query($connect, $delete);
    if ($connect->query($delete) === TRUE) {
        echo "Record deleted successfully";
        session_unset();
        header("location: index.php");
    } else {
        echo "Error deleting record: " . $connect->error;
    }
    $connect->close();
}
if(isset($_POST["save"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $adresa = $_POST['adresa'];
    $mesto = $_POST['mesto'];
    $email = $_POST['email'];


    if (!empty($_POST['fname']) && !empty($_POST['email'])) {
        $select = "UPDATE users SET meno = '$fname' WHERE users_email = '$email'";
        if ($connect->query($select) === TRUE) {
            echo "Record update successfully";
        } else {
            echo "Error updating: " . $connect->error;
        }
    }

    if (!empty($_POST['lname']) && !empty($_POST['email'])) {
        $select = "UPDATE users SET priezvisko = '$lname' WHERE users_email = '$email'";
        if ($connect->query($select) === TRUE) {
            echo "Record update successfully";
        } else {
            echo "Error updating: " . $connect->error;
        }
    }
    if (!empty($_POST['mesto']) && !empty($_POST['email'])) {
        $select = "UPDATE users SET mesto = '$mesto' WHERE users_email = '$email'";
        if ($connect->query($select) === TRUE) {
            echo "Record update successfully";
        } else {
            echo "Error updating: " . $connect->error;
        }
    }
    if (!empty($_POST['adresa']) && !empty($_POST['email'])) {
        $select = "UPDATE users SET adresa = '$adresa' WHERE users_email = '$email'";
        if ($connect->query($select) === TRUE) {
            echo "Record update successfully";
        } else {
            echo "Error updating: " . $connect->error;
        }
    }
    header("location: index.php");

}


?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="CSS/profileStyles.css">

</head>
<body style="background-image: url(imgs/ufc.jpg)" >
<form method="post">
    <style>
        body {
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
<div class="wrapper">
    <div class="profile">
        <div class="content">
            <h1>Upravit profil</h1>
            <form>
<!--       fotka -->
<!--                <fieldset>-->
<!--                    <div class="grid-35">-->
<!--                        <label for="avatar">Vasa Foto</label>-->
<!--                    </div>-->
<!--                    <div class="grid-65">-->
<!--                        <span class="photo" title="Upload your Avatar!"></span>-->
<!--                        <input type="file" class="btn" />-->
<!--                    </div>-->
<!--                </fieldset>-->
                <fieldset>
                    <div class="grid-35">
                        <label for="fname">Meno</label>
                    </div>
                    <div class="grid-65">
                        <input name="fname" type="text" id="fname" tabindex="1" />
                    </div>
                </fieldset>
                <fieldset>
                    <div class="grid-35">
                        <label for="lname">Priezvisko</label>
                    </div>
                    <div class="grid-65">
                        <input name="lname" type="text" id="lname" tabindex="2" />
                    </div>
                </fieldset>
                <fieldset>
                    <div class="grid-35">
                        <label for="adresa">Adresa</label>
                    </div>
                    <div class="grid-65">
                        <input name="adresa" type="text" id="adresa" tabindex="4" />
                    </div>
                </fieldset>
                <!-- Country -->
                <fieldset>
                    <div class="grid-35">
                        <label for="mesto">Mesto</label>
                    </div>
                    <div class="grid-65">
                        <input name="mesto" type="text" id="mesto" tabindex="5" />
                    </div>
                </fieldset>
                <!-- Email -->
                <fieldset>
                    <div class="grid-35">
                        <label for="email">Vas Email</label>
                    </div>
                    <div class="grid-65">
                        <input name="email" type="email" id="email" tabindex="6" />
                    </div>
                </fieldset>
                <fieldset>
                    <input name="cancel" type="submit" class="Btn cancel" value="Cancel" />
                    <input name= "save" type="submit" class="Btn" value="Save Changes" />
                </fieldset>
                <fieldset>
                    <div class="grid-35">
                    </div>
                    <div class="grid-65">
                        <div class="input-field">
                            <label for="psw">
                                <input type="password" class="input"  name="psw" placeholder="PASSWORD"/>
                                <input type="text" class="input" name="uname" placeholder="USERNAME"/>
                            </label>
                        </div>
                    </div>
                </fieldset>
                <input name="delete" type="submit" class="Btn cancel" value="Vymazať účet" />

            </form>
        </div>
    </div>
</div>    </form>
</body>
</div>
</html>

