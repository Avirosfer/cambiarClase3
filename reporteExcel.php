<?php

    if(!isset($_POST['generarReporte'])){
        header('Location: formulariobuscarpaciente.php');
    }

    include 'conexion.php';

        $fecha1=$_POST['fecha1'];
        $fecha1=$_POST['fecha2'];

        //NOMBRE DEL ARCHIVO Y CHARSET
        header('Content-Type:text/csv; charset-latin1');
        header('Content-Disposition:attachment; filename="Reporte.csv"');

        //SALIDA DEL ARCHIVO
        $salida = fopen('php://output', 'w');

        //ENCABEZADOS
        fputcsv($salida, array('Historia Clínica', 'Nombre', 'Sexo', 'Especie', 'Raza', 'Última Atención', 'Propietario', 'Observaciones', '¿Activo?', 'Foto'));

        //QUERY PARA CREAR EL REPORTE

        $sql = 'SELECT *  FROM pacientes WHERE ultAte BETWEEN "$fecha1" and "$fecha2" ORDER BY ultAte';
                                                                            
            try{
                $data = $bd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $exception){
                die($exception->getMessage());
            }

            foreach ($data as $filaR){

            /*$sql = 'SELECT * FROM pacientes';
            $stmt = $bd->prepare($sql);
            $stmt->execute();
            $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $filaR){*/

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