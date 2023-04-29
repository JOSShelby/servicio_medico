<?php
    require_once '../funciones/Excel/reader.php';
    include 'conexion.php';
    if (isset($_FILES['excel'])){
        //echo "<script type=\"text/javascript\" language=\"JavaScript\"> alert (\"Nombre enviado con exito.  \");</script>";		
        if($_FILES['excel']['name']){				
        //echo "<script type=\"text/javascript\" language=\"JavaScript\"> alert (\"El Nombre enviado con exito es: ".$_FILES['excel']['name']."  \");</script>";		
            if(!$_FILES['excel']['error']) 
            {	
            //echo "<script type=\"text/javascript\" language=\"JavaScript\"> alert (\"El Nombre enviado con exito es: ".$_FILES['excel']['tmp_name']." y no tiene error  \");</script>";		
            $archivo = $_FILES['excel']['name'];
            $extension = strtoupper(pathinfo($archivo, PATHINFO_EXTENSION));
            if($extension == "XLS"){

                $inputFile = $_FILES['excel']['tmp_name'];
                $dir_destino = '../excel/';  
                $fecha=date('d')."-".date('m')."-".date('y');
                $excel=$dir_destino.$fecha.".".$extension;
			

                $data = new Spreadsheet_Excel_Reader();
                $data->setOutputEncoding('CP1251');
                $data->read($inputFile);	
    
                $guardado=0;
                // AQUI SE LEE EL ARCHIVO DE EXCEL PARA GENERAR LOS DATOS QUE SE NECESITAN
		
                $highestRow=$data->sheets[0]['numRows'];
		
        	for ($row = 2; $row <= $highestRow; $row++){						
                    //echo "Filas: ".$highestRow;		
                    //$recepcionId=$_POST['recepcionId'];   //Id de la recepcion 
                    //echo $recepcionId=$sheet->getCell("C".$row)->getValue();   //Id de la recepcion 
                    //Aqui se leen cada linea de datos.
                $prueba2 = utf8_decode($data->sheets[0]['cells'][$row][2]) ;
                // echo($prueba2);

                $prueba3 = utf8_decode($data->sheets[0]['cells'][$row][3]);
                // echo($prueba3);

                $prueba4 = utf8_decode($data->sheets[0]['cells'][$row][4]);
                // echo($prueba4);
                
                $prueba5 = utf8_decode($data->sheets[0]['cells'][$row][5]);
                // echo($prueba5);
                
                $prueba6 = utf8_decode($data->sheets[0]['cells'][$row][6]);
                // echo($prueba6);

                if($data->sheets[0]['cells'][$row][7]==NULL){
                         $prueba7 = "sin medicamento";
                }else{
                    $prueba7 = utf8_decode($data->sheets[0]['cells'][$row][7]);
                }

                $prueba8 = utf8_decode($data->sheets[0]['cells'][$row][8]);
                // echo($prueba8);

                $prueba9 = utf8_decode($data->sheets[0]['cells'][$row][9]);
                // echo($prueba9);

                $prueba10 = utf8_decode($data->sheets[0]['cells'][$row][10]);
                // echo($prueba10);

                $prueba11 = utf8_decode($data->sheets[0]['cells'][$row][11]);
                // echo($prueba11);

                $prueba12 = utf8_decode($data->sheets[0]['cells'][$row][12]);
                // echo($prueba12);

                $prueba13 = utf8_decode($data->sheets[0]['cells'][$row][13]);
                // echo($prueba13);

                $prueba14 = utf8_decode($data->sheets[0]['cells'][$row][14]);
                // echo($prueba13);

            

                $query = "INSERT INTO paciente_(fecha_consulta, nombre, edad, genero, especificacion, medicamento, fk_idsub_area, fk_idsintoma, fk_idparte_afectada, fk_idunidad, fk_idarea, fk_idclasificacion_inicial, fk_cie)
                VALUES ('$prueba2', '$prueba3', '$prueba4', '$prueba5', '$prueba6', '$prueba7', '$prueba8', '$prueba9', '$prueba10', '$prueba11','$prueba12', '$prueba13', '$prueba14')";
                pg_query($conexion, $query);
                    // if($data->sheets[0]['cells'][$row][1]==NULL){
                    //     //echo $highestRow;
                    //     break;
                    // }else{
                    //     $num=$data->sheets[0]['cells'][$row][1];
                       

                    //     $nombres=utf8_encode($data->raw[0]['cells'][$row][1]);

                    //     echo $nombres;
                       
                      
                       
                    //  }
                 }
             }
         }
     }
    }

?>