<?php


require_once 'conexion.php';

$idEsp = $_POST['idEsp'];

$sql = "SELECT idRaza, lisRaza FROM raza WHERE idEsp = '$idEsp' ORDER BY lisRaza ASC";
$register = $mysqli->query($sql);

$html = "<option value ='-1' disabled='disabled'>Seleccionar raza</option>";

while($raza = $register->fetch_assoc()) 
    {
        $html = "<option value='".$raza['idRaza']."'>".$raza['lisRaza']."</option>";
    }

echo $html;

?>