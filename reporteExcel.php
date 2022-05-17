<?php

    include 'conexion.php';


    if (isset($_POST['btnCrearExcel'])){


        //NOMBRE DEL ARCHIVO Y CHARSET
        header('Content-Type:text/csv; charset-latin1');
        header('Content-Disposition:attachment; filename="Reporte.csv"');

        //SALIDA DEL ARCHIVO
        $salida = fopen('php://output', 'w');

        //ENCABEZADOS
        fputcsv($salida, array('Historia Clínica', 'Nombre', 'Sexo', 'Especie', 'Raza', 'Última Atención', 'Propietario', 'Observaciones', '¿Activo?', 'Foto'));

        //QUERY PARA CREAR ELREPORTE
        $reporteCsv = $bd->query("SELECT * FROM pacientes;");
        while($filaR=$reporteCsv->fetchAll(PDO::FETCH_ASSOC))
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

    //https://www.youtube.com/watch?v=A1v6r79H9Ys 
    //https://www.youtube.com/watch?v=1igW3bUaGmk 

?>