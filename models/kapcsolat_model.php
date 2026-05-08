<?php

class Kapcsolat_Model
{
    public function get_data($vars)
    {
        $retData = array(
            'eredmeny' => "",
            'uzenet' => ""
        );

        try {
            $dbh = new PDO(
                'mysql:host=localhost;dbname=cukraszda;charset=utf8',
                'root',
                ''
            );

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if(isset($vars['kuld']))
            {
                $stmt = $dbh->prepare("
                    INSERT INTO kapcsolat_uzenetek
                    (nev, email, uzenet)
                    VALUES
                    (:nev, :email, :uzenet)
                ");

                $stmt->execute(array(
                    ':nev' => trim($vars['nev']),
                    ':email' => trim($vars['email']),
                    ':uzenet' => trim($vars['uzenet'])
                ));

                $retData['eredmeny'] = "OK";
                $retData['uzenet'] = "Az üzenet mentése sikeres!";
            }
        }
        catch(PDOException $e)
        {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = $e->getMessage();
        }

        return $retData;
    }
}

?>