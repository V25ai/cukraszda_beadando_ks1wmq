<?php

class Uzenetek_Model
{
    public function get_data($vars)
    {
        $retData['eredmeny'] = "";
        $retData['uzenet'] = "";
        $retData['uzenetek'] = array();

        if(!isset($_SESSION['userid']) || $_SESSION['userid'] == 0)
        {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Az üzenetek megtekintéséhez be kell jelentkezni.";
            return $retData;
        }

        try
        {
            $dbh = Database::getConnection();

            $sql = "
                SELECT id, nev, email, uzenet, kuldo_nev, kuldes_ideje
                FROM kapcsolat_uzenetek
                ORDER BY kuldes_ideje DESC
            ";

            $stmt = $dbh->query($sql);
            $retData['uzenetek'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $retData['eredmeny'] = "OK";
        }
        catch(PDOException $e)
        {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage();
        }

        return $retData;
    }
}

?>