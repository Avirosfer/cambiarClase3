<?php

    if(!isset($_POST['oculto'])){
        header('Location: formulariobuscarpaciente.php');;
    }

    include 'conexion.php';
    $fotPac = addslashes(file_get_contents($_FILES['fotPac']['tmp_name']));

//INFORMACIÓN ENVIADA POR EL FORMULARIO//

    $nomPac = $_POST['nomPac'];
    $espPac = $_POST['espPac'];
    $sexPac = $_POST['sexPac'];
    $razPac = $_POST['razPac'];
    $fecNam = $_POST['fecNam'];
    $colPac = $_POST['colPac'];
    $ultAte = $_POST['ultAte'];
    $fotPac = $_POST['fotPac']; 

    $nomPro = $_POST['nomPro'];
    $apePro = $_POST['apePro'];
    $tipDoc = $_POST['tipDoc'];
    $docPro = $_POST['docPro'];
    $dirPro = $_POST['dirPro'];
    $munPro = $_POST['munPro'];
    $celPro = $_POST['celPro'];
    $emaPro = $_POST['emaPro'];
    /*$hisCli = $_POST['hisCli'];*/
    
    
//ACTUALIZAR TABLA PACIENTE//

    try{

    $sentencia = $bd->prepare ("INSERT INTO pacientes(nomPac, espPac, sexPac, razPac, fecNam, colPac, ultAte, fotPac) VALUES (?,?,?,?,?,?,?,?);");

    $resultado = $sentencia->execute([$nomPac, $espPac, $sexPac, $razPac, $fecNam, $colPac, $ultAte, $fotPac]);


    } catch (Exception $e) {

        echo $e->getMessage();
    }

    //ACTUALIZAR TABLA PROPIETARIO//

    try{

    $query = $bd->prepare("INSERT INTO propietarios(nomPro, apePro, tipDoc, docPro, dirPro, munPro, celPro, emaPro) VALUES (?,?,?,?,?,?,?,?);");

    $register = $query->execute([$nomPro, $apePro, $tipDoc, $docPro, $dirPro, $munPro, $celPro, $emaPro]);


    } catch (Exception $e) {

        echo $e->getMessage();
    }


?>