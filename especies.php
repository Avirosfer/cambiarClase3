<?php

require_once 'conexion.php';

    $sentencia = "SELECT idEsp, lisEsp FROM especie ORDER BY lisEsp";
    $registro = $mysqli->query($sentencia) or die (mysqli_error($mysqli));
       
        while($especie = $registro->fetch_assoc()) { ?>
        
             <option value="<?php echo $especie['idEsp']; ?>"><?php echo $especie['lisEsp']; ?></option>

        <?php }
?>