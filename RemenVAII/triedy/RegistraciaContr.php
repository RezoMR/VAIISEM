<?php

class RegistraciaContr extends Registracia
{

    private $email;
    private $psw;
    private $uname;
    private $pswRepeat;

    public function __construct($email, $psw, $uname, $pswRepeat) {
        $this->email = $email;
        $this->psw = $psw;
        $this->uname = $uname;
        $this->pswRepeat = $pswRepeat;


    }

    public function registraciaUser() {
        if($this->emptyInput() == false) {
            echo "Empty input! ";
            header("location: index.php?error=emtyinput");
            exit();
        }
        if($this->invalidUname() == false) {
            echo "Invalid username! ";
            header("location: index.php?error=invalidusername");
            exit();
        }
        if($this->invalidEmail() == false) {
            echo "Invalid email! ";
            header("location: index.php?error=invalidemail");
            exit();
        }
        if($this->invalidPswRep() == false) {
            echo "Not the same! ";
            header("location: index.php?error=invalidPasswordRepeat");
            exit();
        }
        if($this->unameTaken() == false) {
            echo "Username taken! ";
            header("location: index.php?error=usernameTaken");
            exit();
        }
        $this->setUser($this->uname, $this->psw, $this->email);
    }

    private function emptyInput() {
        $result = false;
        if (empty($this->email || $this->psw || $this->uname || $this->pswRepeat)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidUname() {
         $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidPswRep() {
        $result = false;
        if ($this->psw !== $this->pswRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function unameTaken() {
        $result = false;
        if (!$this->checkUser($this->uname, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }




}