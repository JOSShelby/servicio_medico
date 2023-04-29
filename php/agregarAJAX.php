<?php
    //conexion
    include 'conexion.php';
    
    //area seleccionada
    $idArea = filter_input(INPUT_GET, 'idArea');
    
    //bandera para entrar a la condicion
    $bandera = 0;

    //guardara todas las variables
    $arrRespuesta = [];
    $arraySelects = [];

    //conexion para obtener la clasificacion
    $queryAreaSeleccionada = "SELECT clasificacionarea FROM area_ WHERE status=2 AND idarea = ".$idArea."";
    $conexionAreaSeleccionada = pg_query($conexion, $queryAreaSeleccionada);
    $resultado = pg_fetch_row($conexionAreaSeleccionada);

    if ($idArea > 0){

        $opcionSelect="";
        $query = "SELECT * FROM subarea_ where status=2  AND clasificacionarea = ".$resultado[0]." ORDER BY idsub_area";
        $conexionSubArea = pg_query($conexion, $query);

        $noRows = pg_num_rows($conexionSubArea);
        $arrRespuesta["numero_columnas"] = $noRows;
        for ($indice=0; $indice < $noRows; $indice++){

            $res = pg_fetch_row($conexionSubArea);
            // echo json_encode($res);

            $arraySelects[$indice] = $res;
        }
        $bandera = 1;
        $arrRespuesta["selects"]= $arraySelects;
    }else{
        $arrRespuesta["selects"]= "";
    }

    //guarda las variables a mostrar y las manda como respuesta
    if (isset($resultado[0][0])){
        $arrRespuesta["query"] = $resultado[0][0];
    }

    $arrRespuesta["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
