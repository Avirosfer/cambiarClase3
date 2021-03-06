
<?php

require_once 'conexion.php';

$sentencia = "SELECT * FROM pacientes";
$registro = $mysqli->query($sentencia);

$consulta = "SELECT * FROM propietarios";
$resultado = $mysqli->query($consulta);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet Pet Software</title>
    
    <link rel="preload" href="css/normalize.css" as="style"><link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link rel="preload" href="css/buscarpaciente.css" as="style">
    <link rel="stylesheet" href="css/buscarpaciente.css">
    <link rel="stylesheet" href="css/onOff.css">
    <script src="js/html2pdf.bundle.min.js"></script>
    <script src="js/convertirPDF.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="js/main.js"></script>
    <style>
        input:focus {
        outline: 2px;
        background-color: var(--reportes);
        border: solid 0.2rem var(--hover);
        border-radius: 15px;
        }
    </style>
</head>

<body class="agrupar">

                            <div class="flex alinear-der">
                                                            
                                    <form action="" method="POST">
                                            <a href="formulariobuscarpaciente.php">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x" id="close-activar-pac" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <circle cx="12" cy="12" r="9" />
                                                            <path d="M10 10l4 4m0 -4l-4 4" />
                                                    </svg>
                                            </a>
                                    </form>
                        
                            </div>
                                           
                            <div class="fecha-vis-pac">
                                    <label>Fecha:</label>
                                    <input class="input-date" type="date" value="<?php $fecha = new DateTime('now', new DateTimeZone('America/Bogota'));echo date('Y-m-d');?>">
                            </div>                                          

                            <div class="contenedorhc">
                
                                    <div class="historiaclinica">
                                            <label>Historia Cl??nica</label><br>
                                            <input type="text" name="hisCli" value="">
                                    </div>  

                            </div>
                            
<form action="insertarPaciente.php" method="POST" enctype="multipart/form-data">

                            <div class="paciente-vis-pac">

                                    <div class="datos-paciente-vis-pac">

                                        <h2>Datos Paciente</h2>

                                    </div>

                                            <div class="contenedor-infopaciente-vis-pac">   

                                                        <div class="contenedor-imagen flex">

                                                                <figure >
                                                                    <input type="text" name="nombre" placeholder="Nombre..." value=""/>
                                                                    <input type="file" name="fotPac" />
                                                                </figure>

                                                        </div>

                                                        <div class="campo1">
                                                            <label>Nombre:</label>
                                                            <input class="input-text" type="text" name="nomPac" value="" autofocus>
                                                        </div>


                                                        <div class="campo1">
                                                            <label>Especie:</label>
                                                            <select class="selector" name="espPac" id="espPac" >
                                                            <option value = "-1" disabled="disabled">Seleccionar especie</option>

                                                            <?php
                                                                    require_once 'conexion.php';

                                                                    $sentencia = "SELECT idEsp, lisEsp FROM especie ORDER BY lisEsp";
                                                                    $registro = $mysqli->query($sentencia) or die (mysqli_error($mysqli));
                                                                    
                                                                    while($especie = $registro->fetch_assoc()) { ?>
                                                                    <option value="<?php echo $especie['idEsp']; ?>"><?php echo $especie['lisEsp']; ?></option>
                                                                    <?php }
                                                            ?>
                                                                    
                                                            </select>
                                                        </div>

                                                        <div class="campo1">
                                                             <label>Raza:</label>
                                                             <select class="selector" name="razPac" id="razPac">
                                                             
                                                             </select>
                                                        </div>

                                                        <div class="campo1">

                                                            <label>Sexo:</label>
                                                            <select class="selector" name="sexPac" id="sexPac">
                                                            <option value = "-1" disabled="disabled">Seleccionar sexo</option>
                                                                
                                                                <?php
                                                                        require_once 'conexion.php';

                                                                        $sentencia = "SELECT idSexo, lisSex FROM sexo ORDER BY lisSex";
                                                                        $registro = $mysqli->query($sentencia) or die (mysqli_error($mysqli));
                                                                    
                                                                        while ($output=$registro->fetch_assoc()){?>
                                                                        <option value="<?php echo $output['idSexo']; ?> "> <?php echo $output["lisSex"];?></option>
                                                                        <?php }    
                                                                ?>

                                                            </select>
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Fecha de Nacimiento:</label>
                                                            <input class="input-text" type="date" name="fecNam" id="fecNam">
                                                        </div>

                                                        <div class="campo1">

                                                            <label>Color:</label>
                                                            <select class="selector" name="colPac" id="colSel" >
                                                            <option value = "-1" disabled="disabled">Seleccionar color</option>

                                                                <?php
                                                                        require_once 'conexion.php';

                                                                        $sentencia = "SELECT idCol, lisCol FROM color ORDER BY lisCol";
                                                                        $registro = $mysqli->query($sentencia) or die (mysqli_error($mysqli));
                                                                   
                                                                        while ($output=$registro->fetch_assoc()){?>
                                                                       <option value="<?php echo $output['idCol']; ?> "> <?php echo $output["lisCol"];?></option>
                                                                        <?php } 

                                                                ?>

                                                            </select>
                                                            
                                                        </div>
                                                        <div class="campo1">
                                                            <label>??ltima atenci??n:</label>
                                                            <input class="input-text" type="date" name="ultAte" id="ultAte" value="">
                                                        </div>
                                                
                                            </div> <!--Contenedor-infopaciente--> 

                            </div>          

<!----------3. POP UP "VISUALIZAR PACIENTE - 3.2. CONTENEDOR PROPIETARIO"---------->

                            <div class="propietario-vis-pac">


                                        <div class="datos-propietario-vis-pac">
                                            <h2>Datos Propietario</h2>
                                        </div>


                                                        <div class="contenedor-infopropietario-vis-pac">  

                                                            <div class="campo2">
                                                                <label>Nombres:</label>
                                                                <input class="input-text" type="text" name="nomPro" value="">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Apellidos:</label>
                                                                <input class="input-text" type="text" name="apePro" value="">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Tipo de documento:</label>
                                                                <input class="input-text" type="text" name="tipDoc" value="">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>N??mero de documento:</label>
                                                                <input class="input-text" type="text" name="docPro"value="">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Direcci??n:</label>
                                                                <input class="input-text" type="text" name="dirPro" value="">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Municipio:</label>
                                                                <input class="input-text" type="text" name="munPro" value="">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Celular:</label>
                                                                <input class="input-text" type="text" name="celPro" value="">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>E-mail:</label>
                                                                <input class="input-text" type="text" name="emaPro" value="">
                                                            </div>
                                                            
                                                        </div> <!--contenedor-infopropietario-->

                                        <div class="contenedor-logo-vis-pac" id="element-to-print">
                                            <img src="img/logohospital.png" alt="" class="imagen1"/>
                                            <img src="img/leyenda.png" alt=""class="imagen2"/>
                                        </div>


                                        <div class="contenedor-info-veterinaria">
                                            <p class="parrafo-info-vet">
                                                    Direcci??n: Transversal 23 b - Bis N?? 26 -23 <br>
                                                    Manila II Sector - Fusagasug?? <br>
                                                    Contacto 300 767 2316   -  311 441 2405 <br>
                                            </p>
                                        </div>


                                        <div class="contenedor-btns-new-pac">

                                                    <div class="btn2">
                                                        <input class="input-text" type="hidden" name="oculto" value="1">
                                                        <button type="submit" id="crearPaciente">Guardar</button>
                                                    </div>
                                               

                                                    <div class="btn2">
                                                        <button type="button" id="btn">Cancelar</button>
                                                    </div>
                                    
                                        </div>

                        </div>   


</form> 

<!--------------1. POP UP "INFORMACI??N ALMACENADA CON ??XITO"------------------>

        <div class="pop-up">
            
            <div class="pop-wrap">

            <div class="close flex alinear-derecha">
                
                <form action="" method="POST">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x" id="close" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#81D7F0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <circle cx="12" cy="12" r="9" />
                              <path d="M10 10l4 4m0 -4l-4 4" />
                        </svg>
                    </a>
                </form>

            </div>

                <h3>Informaci??n almacenada con ??xito.</h3>

                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="92" height="92" viewBox="0 0 24 24" stroke-width="1" stroke="#81D7F0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <circle cx="12" cy="12" r="9" />
                      <path d="M9 12l2 2l4 -4" />
                </svg>
                
            </div>

        </div> 


</form>
</body>
</html>