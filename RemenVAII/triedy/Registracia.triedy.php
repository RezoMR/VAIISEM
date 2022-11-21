<?php

class Registracia extends Dbh {



    protected function setUser($uname, $psw, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uname, users_psw, users_email) VALUES (?, ?, ?);');

        $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uname, $hashedPsw, $email))) {
            $stmt = null;
            header("location: index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }



    protected function checkUser($uname, $email) {
        $stmt = $this->connect()->prepare("SELECT users_uname FROM users WHERE users_uname = ? OR users_email = ?;");

        if (!$stmt->execute(array($uname, $email))) {
            $stmt = null;
            header("location: index.php?error=stmtfailed");
            exit();
        }
        $resultCheck = false;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }



}