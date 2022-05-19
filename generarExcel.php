<?php
    $mysqli = mysqli_connect("localhost", "root", "", "vetpetsoft");
    $pacientes = ("SELECT * FROM pacientes");
    header("Content-Type: aplication/vnd.ms-excel; charset = utf8_spanish_ci"); 
    header("Content-Disposition: attachment; filename= reporte_pacientes.xls");
?>

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
                    <th class="acciones">Acciones</th><!--columna--> 
            </tr>

            <?php
                
             
                    $mysqli = mysqli_connect("localhost", "root", "", "vetpetsoft");
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
                        <td name="tdAcciones" class="contenedor-acciones">
                        

                            <form action="" method="POST">

                                <a href="">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>

                                </a>

                            </form>

                            <form action="" method="POST">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                    </svg>

                            </form>

                            <div class="switch-button">
                                <!-- Checkbox -->
                                <input type="checkbox" name="switch-button"  id="switch-label" class="switch-button__checkbox">
                                <!-- Botón -->
                                <label for="switch-label" class="switch-button__label"></label>
                            </div>


                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <circle cx="12" cy="12" r="9" />
                                <line x1="9" y1="12" x2="15" y2="12" />
                                <line x1="12" y1="9" x2="12" y2="15" />
                            </svg>
                        </td><!--columna-->
                    </tr>

                    <?php
                } /*mysqli_free_result($result)*;*/
            ?>
            
        </table>