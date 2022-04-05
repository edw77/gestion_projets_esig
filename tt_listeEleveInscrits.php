<?php
    session_start();
    require_once("ConnexionBDD.inc.php");
    $mysqli = new mysqli($host, $login, $password, $dbname);
    if ($mysqli->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }
$result = mysqli_query($con,"SELECT * FROM utilisateur");

echo "<table border='1'>
<tr>
<th>Prenom :</th>
<th>Nom :</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['prenom'] . "</td>";
echo "<td>" . $row['nom'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>