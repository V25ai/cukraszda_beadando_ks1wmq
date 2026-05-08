<h2>Kapcsolat</h2>

<?php
if(isset($retData['uzenet']))
{
    echo "<p>" . $retData['uzenet'] . "</p>";
}
?>

<form action="" method="post">

    <p>
        Név:<br>
        <input type="text" name="nev" required>
    </p>

    <p>
        Email:<br>
        <input type="email" name="email" required>
    </p>

    <p>
        Üzenet:<br>
        <textarea name="uzenet" rows="6" cols="40" required></textarea>
    </p>

    <p>
        <input type="submit" name="kuld" value="Küldés">
    </p>

</form>