<?php

class Kapcsolat_Model
{
    public function get_data($vars)
    {
        $retData['eredmeny'] = "";
        $retData['uzenet'] = "";

        if(isset($vars['kuld']))
        {
            $nev = trim($vars['nev']);
            $email = trim($vars['email']);
            $uzenet = trim($vars['uzenet']);

            if($nev == "" || $email == "" || $uzenet == "")
            {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Minden mező kitöltése kötelező!";
                return $retData;
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Hibás email cím!";
                return $retData;
            }

            try
            {
                $dbh = Database::getConnection();

                $kuldoNev = $nev;

                if(isset($_SESSION['userid']) && $_SESSION['userid'] != 0)
                {
                    $kuldoNev = $_SESSION['userlastname'] . " " . $_SESSION['userfirstname'];
                }

                $sql = "
                    INSERT INTO kapcsolat_uzenetek
                    (
                        nev,
                        email,
                        uzenet,
                        kuldo_nev,
                        kuldes_ideje
                    )
                    VALUES
                    (
                        :nev,
                        :email,
                        :uzenet,
                        :kuldo_nev,
                        NOW()
                    )
                ";

                $stmt = $dbh->prepare($sql);

                $stmt->execute(array(
                    ':nev' => $nev,
                    ':email' => $email,
                    ':uzenet' => $uzenet,
                    ':kuldo_nev' => $kuldoNev
                ));

                $retData['eredmeny'] = "OK";
                $retData['uzenet'] = "Az üzenet mentése sikeres!";
            }
            catch(PDOException $e)
            {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage();
            }
        }

        return $retData;
    }
}

?>