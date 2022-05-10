<?php

    include 'conexion.php';

    $idEsp = isset($_POST['idEsp']) ? $_POST['idEsp'] : 0;
    $command = isset($_POST['get']) ? $_POST['get'] : "";


    switch  ($command){

        case "espPac":
            $sql = 'SELECT E.idEsp AS EspecieID, E.lisEsp AS EspecieList FROM especie E ORDER BY E.lisEsp';
                                                                            
            try{
                $data = $bd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $exception){
                die($exception->getMessage());
            }

            foreach ($data as $especie){?>
                <option value="<?php echo $especie['EspecieID']; ?>"><?php echo $especie["EspecieList"];?></option>
                <?php }

            break;

        case "razPac":
            $sql = 'SELECT R.idRaz AS RazaID, R.lisRaz AS RazaList FROM raza R WHERE idESp= ORDER BY R.lisRaz' . $idEsp;
                                                                            
            try{
                $data = $bd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $exception){
                die($exception->getMessage());
            }

            foreach ($data as $raza){?>
                <option value="<?php echo $raza['RazaID']; ?>"><?php echo $raza['RazaList'];?></option>
                <?php }

            break;

    }

   


?>