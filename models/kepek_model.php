<?php

class Kepek_Model
{
    public function get_data($vars)
    {
        $retData['eredmeny'] = "";
        $retData['uzenet'] = "";
        $retData['kepek'] = array();

        $mappa = "uploads/";

        if(!file_exists($mappa))
        {
            mkdir($mappa, 0777, true);
        }

        // KÉP TÖRLÉS

        if(isset($_POST['torles']))
        {
            if(isset($_SESSION['userid']) &&
               $_SESSION['userid'] != 0)
            {
                $fajl =
                    basename($_POST['fajl']);

                $teljesUt =
                    $mappa . $fajl;

                if(file_exists($teljesUt))
                {
                    unlink($teljesUt);

                    $retData['eredmeny'] = "OK";
                    $retData['uzenet'] =
                        "A kép törlése sikeres!";
                }
            }
        }

        // KÉP FELTÖLTÉS

        if(isset($_POST['feltolt']))
        {
            if(!isset($_SESSION['userid']) ||
               $_SESSION['userid'] == 0)
            {
                $retData['eredmeny'] = "ERROR";

                $retData['uzenet'] =
                    "Képfeltöltéshez be kell jelentkezni!";
            }
            else
            {
                if(isset($_FILES['kep']) &&
                   $_FILES['kep']['error'] == 0)
                {
                    $fajlNev =
                        time() . "_" .
                        basename($_FILES['kep']['name']);

                    $cel =
                        $mappa . $fajlNev;

                    $tipus =
                        strtolower(
                            pathinfo(
                                $cel,
                                PATHINFO_EXTENSION
                            )
                        );

                    $engedelyezett =
                        array(
                            "jpg",
                            "jpeg",
                            "png",
                            "gif",
                            "webp"
                        );

                    if(in_array($tipus, $engedelyezett))
                    {
                        if(move_uploaded_file(
                            $_FILES['kep']['tmp_name'],
                            $cel
                        ))
                        {
                            $retData['eredmeny'] = "OK";

                            $retData['uzenet'] =
                                "A kép feltöltése sikeres!";
                        }
                        else
                        {
                            $retData['eredmeny'] = "ERROR";

                            $retData['uzenet'] =
                                "A kép mentése sikertelen!";
                        }
                    }
                    else
                    {
                        $retData['eredmeny'] = "ERROR";

                        $retData['uzenet'] =
                            "Csak képfájl tölthető fel!";
                    }
                }
            }
        }

        // KÉPEK BETÖLTÉSE

        $fajlok = glob($mappa . "*");

        if($fajlok)
        {
            rsort($fajlok);

            foreach($fajlok as $fajl)
            {
                $retData['kepek'][] = $fajl;
            }
        }

        return $retData;
    }
}

?>