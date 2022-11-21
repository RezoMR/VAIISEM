<?php

class Login extends Dbh {



    protected function sgtUser($uname, $psw) {
        $stmt = $this->connect()->prepare('SELECT users_psw FROM users WHERE users_uname = ? OR users_email = ?;');

        $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uname, $hashedPsw))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        if (!$stmt->rowCount()== 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pswHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPsw = password_verify($psw, $pswHashed[0]["users_psw"]);

        if ($checkPsw == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif ($checkPsw == true){
            $stmt = $this->connect()->prepare('SELECT users_psw FROM users WHERE users_uname = ? OR users_email = ? AND users_psw = ?;');

            if (!$stmt->execute(array($uname, $uname, $hashedPsw))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            if (!$stmt->rowCount()== 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }
          $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruname"] = $user[0]["users_uname"];

        }


        $stmt = null;
    }
}