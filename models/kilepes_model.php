<?php

class Kilepes_Model
{
    public function get_data()
    {
        $retData['eredmény'] = "OK";

        $vezeteknev = isset($_SESSION['userlastname']) ? $_SESSION['userlastname'] : "";
        $keresztnev = isset($_SESSION['userfirstname']) ? $_SESSION['userfirstname'] : "";

        $retData['uzenet'] = "Viszontlátásra, örülünk, hogy itt volt!" . $vezeteknev . " " . $keresztnev . "!";

        $_SESSION['userid'] = 0;
        $_SESSION['userlastname'] = "";
        $_SESSION['userfirstname'] = "";
        $_SESSION['username'] = "";
        $_SESSION['userlevel'] = "1__";
        Menu::setMenu();
        return $retData;
    }
}

?>