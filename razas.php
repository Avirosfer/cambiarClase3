<?php

include 'conexion.php';

$idEspecie = $_GET['param_id'];

$sql = 'SELECT R.idRaza AS RazaID, R.lisRaza AS RazaList FROM raza R WHERE idESp = $idEspecie';
                                                                            
            try{
                $data = $bd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $exception){
                die($exception->getMessage());
            }

            foreach ($data as $raza){?>
                <option value="<?php echo $raza['RazaID']; ?>"><?php echo $raza['RazaList'];?></option>
                <?php }

?>