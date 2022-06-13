<?php
    $mysqli = mysqli_connect("localhost", "root", "Rokuro800520649", "vetpetsoft");
    $pacientes = ("SELECT * FROM pacientes");
    header("Content-Type: aplication/vnd.ms-excel; charset = utf8_spanish_ci"); 
    header("Content-Disposition: attachment; filename= reporte_pacientes.xls");
?>


<meta charset="utf-8">
<table class="tabla" id="tblData">

            <tr class="primaFila"><!--fila-->
                    <th class="historia">Historia Clínica</th><!--columna-->
                    <th class="nombre">Nombre</th><!--columna-->
                    <th class="sexo">Sexo</th><!--columna-->
                    <th class="especie">Especie</th><!--columna-->
                    <th class="raza">Raza</th><!--columna-->
                    <th class="ultAtencion">Fecha Ultima Atención</th><!--columna-->
                    <th class="propietario">Propietario</th><!--columna-->
                    <th class="observaciones">Observaciones</th><!--columna-->
                    <th class="acciones">Paciente activo</th><!--columna--> 
            </tr>

            <?php
                
             
                    $mysqli = mysqli_connect("localhost", "root", "Rokuro800520649", "vetpetsoft");
                    $pacientes = ("SELECT * FROM pacientes");
                    $registros = mysqli_query($mysqli, $pacientes );
                    while($dato=mysqli_fetch_assoc($registros))
                     {?>

                    <tr class="fila"><!--fila-->
                        <td name="tdHistoria"><?php echo $dato['hisCli']; ?></td><!--columna-->
                        <td name="tdNombre"><?php echo $dato['nomPac']; ?></td><!--columna-->
                        <td name="tdSexo"><?php echo $dato['sexPac']; ?></td><!--columna-->
                        <td name="tdEspecie"><?php echo $dato['espPac']; ?></td><!--columna-->
                        <td name="tdRaza"><?php echo $dato['razPac']; ?></td><!--columna-->
                        <td name="tdUltAtencion"><?php echo $dato['ultAte']; ?></td><!--columna-->
                        <td name="tdPropietario"><?php echo $dato['proPac']; ?></td><!--columna-->
                        <td name="tdObservaciones"><?php echo $dato['obsPac']; ?></td><!--columna-->
                        <td name="tdAcciones" class="contenedor-acciones"><?php echo $dato['pacAct']; ?></td>
                        

                           

                    <?php
                } /*mysqli_free_result($result)*;*/
            ?>
            
        </table>