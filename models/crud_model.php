<?php

class Crud_Model
{
    public function get_data($vars)
    {
        $retData['eredmeny'] = "";
        $retData['uzenet'] = "";
        $retData['sutik'] = array();
        $retData['szerkesztendo'] = null;

        try
        {
            $dbh = Database::getConnection();

            if(isset($vars['uj']))
            {
                $nev = trim($vars['nev']);
                $tipus = trim($vars['tipus']);
                $dijazott = isset($vars['dijazott']) ? 1 : 0;

                if($nev != "" && $tipus != "")
                {
                    $sql = "INSERT INTO suti (nev, tipus, dijazott)
                            VALUES (:nev, :tipus, :dijazott)";

                    $stmt = $dbh->prepare($sql);
                    $stmt->execute(array(
                        ':nev' => $nev,
                        ':tipus' => $tipus,
                        ':dijazott' => $dijazott
                    ));

                    $retData['uzenet'] = "Új sütemény sikeresen hozzáadva!";
                }
            }

            if(isset($vars['torles']) && isset($vars['id']))
            {
                $sql = "DELETE FROM suti WHERE id = :id";

                $stmt = $dbh->prepare($sql);
                $stmt->execute(array(
                    ':id' => $vars['id']
                ));

                $retData['uzenet'] = "Sütemény törölve!";
            }

            if(isset($vars['szerkesztes']) && isset($vars['id']))
            {
                $sql = "SELECT id, nev, tipus, dijazott
                        FROM suti
                        WHERE id = :id";

                $stmt = $dbh->prepare($sql);
                $stmt->execute(array(
                    ':id' => $vars['id']
                ));

                $retData['szerkesztendo'] = $stmt->fetch(PDO::FETCH_ASSOC);
            }

            if(isset($vars['modositas']) && isset($vars['id']))
            {
                $nev = trim($vars['nev']);
                $tipus = trim($vars['tipus']);
                $dijazott = isset($vars['dijazott']) ? 1 : 0;

                if($nev != "" && $tipus != "")
                {
                    $sql = "UPDATE suti
                            SET nev = :nev,
                                tipus = :tipus,
                                dijazott = :dijazott
                            WHERE id = :id";

                    $stmt = $dbh->prepare($sql);
                    $stmt->execute(array(
                        ':nev' => $nev,
                        ':tipus' => $tipus,
                        ':dijazott' => $dijazott,
                        ':id' => $vars['id']
                    ));

                    $retData['uzenet'] = "Sütemény módosítva!";
                }
            }

            $sql = "SELECT id, nev, tipus, dijazott
                    FROM suti
                    ORDER BY id DESC";

            $stmt = $dbh->query($sql);
            $retData['sutik'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

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