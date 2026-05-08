<?php

class Beleptet_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";

		try {
			$connection = Database::getConnection();
					if(isset($vars['regisztracio']))
					{
						$csaladiNev = trim($vars['reg_csaladi_nev']);
						$utonev = trim($vars['reg_utonev']);
						$login = trim($vars['reg_login']);
						$password = trim($vars['reg_password']);

						if($csaladiNev == "" || $utonev == "" || $login == "" || $password == "")
						{
							$retData['eredmeny'] = "ERROR";
							$retData['uzenet'] = "Minden regisztrációs mező kitöltése kötelező!";
							return $retData;
						}

						$hash = password_hash($password, PASSWORD_DEFAULT);

						$sql = "insert into felhasznalok
								(csaladi_nev, utonev, bejelentkezes, jelszo, jogosultsag)
								values
								(:csaladi_nev, :utonev, :bejelentkezes, :jelszo, :jogosultsag)";

						$stmt = $connection->prepare($sql);

						$stmt->execute(array(
							':csaladi_nev' => $csaladiNev,
							':utonev' => $utonev,
							':bejelentkezes' => $login,
							':jelszo' => $hash,
							':jogosultsag' => '1'
						));

						$retData['eredmeny'] = "OK";
						$retData['uzenet'] = "Sikeres regisztráció! Most már be tudsz jelentkezni.";
						return $retData;
					}	

			$sql = "select id, csaladi_nev, utonev, jelszo, jogosultsag 
					from felhasznalok 
					where bejelentkezes = '".$vars['login']."'";

			$stmt = $connection->query($sql);
			$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);

			switch(count($felhasznalo)) {
				case 0:
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Helytelen felhasználói név-jelszó pár!";
					break;

				case 1:
					if(password_verify($vars['password'], $felhasznalo[0]['jelszo']))
					{
						$retData['eredmeny'] = "OK";
						$retData['uzenet'] = "Kedves ".$felhasznalo[0]['csaladi_nev']." ".$felhasznalo[0]['utonev']."!<br><br>
											  Jó munkát kívánunk rendszerünkkel.<br><br>
											  Az üzemeltetők";

						$_SESSION['userid'] = $felhasznalo[0]['id'];
						$_SESSION['userlastname'] = $felhasznalo[0]['csaladi_nev'];
						$_SESSION['userfirstname'] = $felhasznalo[0]['utonev'];
						$_SESSION['username'] = $vars['login'];
					if($felhasznalo[0]['jogosultsag'] == "1") {
    					$_SESSION['userlevel'] = "_1_";
					} else {
    					$_SESSION['userlevel'] = $felhasznalo[0]['jogosultsag'];
					}

						Menu::setMenu();
					}
					else
					{
						$retData['eredmeny'] = "ERROR";
						$retData['uzenet'] = "Helytelen felhasználói név-jelszó pár!";
					}
					break;

				default:
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Több felhasználót találtunk a megadott felhasználói név-jelszó párral!";
			}
		}
		catch (PDOException $e) {
			$retData['eredmeny'] = "ERROR";
			$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}

		return $retData;
	}
}

?>