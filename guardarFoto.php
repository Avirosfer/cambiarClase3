<?php
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));


    try{

        $sentencia = $bd->prepare ("INSERT INTO pacientes(fotpac) VALUES (?);");
        $resultado = $sentencia->execute([$foto]);
    
        } catch (Exception $e) {
    
            echo $e->getMessage();
        }

?> 