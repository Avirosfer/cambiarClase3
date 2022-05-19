<?php

$mysqli = mysqli_connect("localhost", "root", "", "vetpetsoft");//Conexion a la Base de Datos

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

    if(isset($_POST['generarReporte']))
    
{

        //NOMBRE DEL ARCHIVO Y CHARSET
        header('Content-Type:text/csv; charset=latin1');
        header('Content-Disposition:attachment; filename="Reporte.csv"');

        //SALIDA DEL ARCHIVO
        $salida = fopen('php://output', 'w');

        //ENCABEZADOS
        fputcsv($salida, array('Historia Clínica', 'Nombre', 'Sexo', 'Especie', 'Raza', 'Última Atención', 'Propietario', 'Observaciones', '¿Activo?', 'Foto'));

        //QUERY PARA CREAR EL REPORTE
        $reporteCsv = $mysqli->query(" SELECT * FROM paciente WHERE ultAte BETWEEN '$fecha1' AND '$fecha2' ");
        while($filaR = $reporteCsv->fetch_assoc())
            fputcsv($salida, array($filaR['hisCli'],
                                   $filaR['nomPac'], 
                                   $filaR['sexPac'],    
                                   $filaR['espPac'], 
                                   $filaR['razPac'],           
                                   $filaR['ultAte'],      
                                   $filaR['proPac'],  
                                   $filaR['obsPac'], 
                                   $filaR['pacAct'],
                                   $filaR['fotPac']));
}
        
    // https://www.youtube.com/watch?v=wAf4qa1LVMk (With PDO)
    //https://www.youtube.com/watch?v=A1v6r79H9Ys 
    //https://www.youtube.com/watch?v=1igW3bUaGmk 

?>