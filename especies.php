<?php

include 'conexion.php';

$sql = 'SELECT E.idEsp AS EspecieID, E.lisEsp AS EspecieList FROM especie E ORDER BY E.lisEsp';
                                                                            
            try{
                $data = $bd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $exception){
                die($exception->getMessage());
            }

            foreach ($data as $especie){?>
                <option value="<?php echo $especie['EspecieID']; ?>"><?php echo $especie["EspecieList"];?></option>
                <?php }
?>