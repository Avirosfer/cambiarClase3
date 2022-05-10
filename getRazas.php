<?php

    include 'conexion.php';

    $sql = 'SELECT idRaz, lisRaz FROM raza WHERE idEsp = '.$_GET['idEsp'].' ORDER BY lisRaz';

    try {
        $data = $bd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $exception) {
        die($exception->getMessage());
    }

    header('Content-Type: application/json');
    echo json_encode($data);

?>