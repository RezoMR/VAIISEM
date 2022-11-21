<?php

class LoginContr extends Login
{

    private $psw;
    private $uname;

    public function __construct($psw, $uname) {
        $this->psw = $psw;
        $this->uname = $uname;
    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            echo "Empty input! ";
            header("location: ../index.php?error=emtyinput");
            exit();
        }
        $this->getUser($this->uname, $this->psw);
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


}