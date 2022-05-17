<?php

    include 'conexion.php';

    $sql = 'SELECT idRaza, lisRaza FROM raza WHERE idEsp = '.$_GET['idEsp'].' ORDER BY lisRaza';

    try {
        $data = $bd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $exception) {
        die($exception->getMessage());
    }

    foreach ($data as $raza){?>
        <option value="<?php echo $raza['RazaID']; ?>"><?php echo $raza['RazaList'];?></option>
        <?php }


    header('Content-Type: application/json');
    echo json_encode($data);

?>