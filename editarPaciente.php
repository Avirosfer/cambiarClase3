<?php

    require_once 'conexion.php';

    $hisCli = $_GET['hisCli'];

    $sentencia = "SELECT * FROM pacientes WHERE hisCli='".$hisCli."' ";
    $registro = $mysqli->query($sentencia) or die (mysqli_error($mysqli));
    $dato=$registro->fetch_assoc();

    $query = "SELECT * FROM propietarios WHERE hisCli='".$hisCli."' ";
    $register = $mysqli->query($query) or die (mysqli_error($mysqli));
    $data=$register->fetch_assoc();

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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="js/main.js"></script>
    <style>
        input:focus {
        outline: 2px;
        background-color: #ffe6f2;
        border: solid 0.2rem var(--azulClaro);
        border-radius: 15px;
        }
    </style>
</head>

<body class="agrupar">

<form action="guardarPaciente.php" method="POST"> 

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
                                            <label>Historia Clínica</label><br>
                                            <input type="text" name="ediHistoria" value="<?php echo $dato['hisCli'];  ?>">
                                    </div>
                                    

                            </div>

                            <div class="paciente-vis-pac">

                                    <div class="datos-paciente-vis-pac">

                                        <h2>Datos Paciente</h2>

                                    </div>


                                            <div class="contenedor-infopaciente-vis-pac">   

                                                        <div class="contenedor-imagen flex">

                                                                <figure >
                                                                     <img  class="fotoMascota" src="data:image/jpg;base64,<?php echo base64_encode($dato['fotPac']); ?>">
                                                                </figure>

                                                        </div>

                                                        <div class="campo1">
                                                            <label>Nombre:</label>
                                                            <input class="input-text" type="text" name="nomPac" id="pacNom" value="<?php echo $dato['nomPac'];  ?>" autofocus>
                                                        </div>

                                                        <div class="campo1">
                                                            <label>Especie:</label>
                                                            <input class="input-text" type="text" name="espPac" value="<?php echo $dato['espPac'];  ?>">
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Raza:</label>
                                                            <input class="input-text" type="text" name="razPac" value="<?php echo $dato['razPac'];  ?>">
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Sexo:</label>
                                                            <input class="input-text" type="text" name="sexPac" value="<?php echo $dato['sexPac'];  ?>">
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Fecha de Nacimiento:</label>
                                                            <input class="input-text" type="date" name="fecNam" value="<?php echo $dato['fecNam'];  ?>">
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Color:</label>
                                                            <input class="input-text" type="text" name="colPac" value="<?php echo $dato['colPac'];  ?>">
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Última atención:</label>
                                                            <input class="input-text" type="date" name="ultAte" value="<?php echo $dato['ultAte'];  ?>">
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
                                                                <input class="input-text" type="text" name="nomPro" value="<?php echo $data['nomPro'];  ?>">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Apellidos:</label>
                                                                <input class="input-text" type="text" name="apePro" value="<?php echo $data['apePro'];  ?>">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Tipo de documento:</label>
                                                                <input class="input-text" type="text" name="tipDoc" value="<?php echo $data['tipDoc'];  ?>">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Número de documento:</label>
                                                                <input class="input-text" type="text" name="docPro"value="<?php echo $data['docPro'];  ?>">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Dirección:</label>
                                                                <input class="input-text" type="text" name="dirPro" value="<?php echo $data['dirPro'];  ?>">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Municipio:</label>
                                                                <input class="input-text" type="text" name="munPro" value="<?php echo $data['munPro'];  ?>">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Celular:</label>
                                                                <input class="input-text" type="text" name="celPro" value="<?php echo $data['celPro'];  ?>">
                                                            </div>

                                                            <div class="campo2">
                                                                <label>E-mail:</label>
                                                                <input class="input-text" type="text" name="emaPro" value="<?php echo $data['emaPro'];  ?>">
                                                            </div>
                                                            
                                                        </div> <!--contenedor-infopropietario-->

                                        <div class="contenedor-logo-vis-pac" id="element-to-print">
                                            <img src="img/logohospital.png" alt="" class="imagen1"/>
                                            <img src="img/leyenda.png" alt=""class="imagen2"/>
                                        </div>


                                        <div class="contenedor-info-veterinaria">
                                            <p class="parrafo-info-vet">
                                                    Dirección: Transversal 23 b - Bis N° 26 -23 <br>
                                                    Manila II Sector - Fusagasugá <br>
                                                    Contacto 300 767 2316   -  311 441 2405 <br>
                                            </p>
                                        </div>


                                        <div class="contenedor-btns-new-pac">

                                                
                                                    <div class="btn2">
                                                        <input class="input-text" type="hidden" name="oculto" value="1">
                                                        <input type="hidden" name= "hisCli2" value="<?php echo $dato['hisCli'];  ?>">
                                                        <input type="hidden" name= "hisCli3" value="<?php echo $data['hisCli'];  ?>">
                                                        <button type="submit" id="guardarEdit">Guardar</button>
                                                    </div>
                                               

                                                    <div class="btn3">
                                                        <button type="button">Cancelar</button>
                                                    </div>
                                    
                                        </div>

                        </div>   


</form> 

<!--------------1. POP UP "INFORMACIÓN ALMACENADA CON ÉXITO"------------------>

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

                <h3>Información almacenada con éxito.</h3>

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
