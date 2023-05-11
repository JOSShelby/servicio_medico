<?php
    include 'conexion.php';
    
    $bandera =0;

    $fecha = filter_input(INPUT_GET,'fecha');
    $unidad_de_negocio = filter_input(INPUT_GET, 'unidad');
    $nombre = filter_input(INPUT_GET, 'nombre');
    $edad = filter_input(INPUT_GET,'edad');
    $genero = filter_input(INPUT_GET,'genero');
    $area = filter_input(INPUT_GET,'area');
    $sub_area = filter_input(INPUT_GET,'subArea');
    $clasificacion_inicial = filter_input(INPUT_GET,'clasificacion');
    $sintoma_inicial_de_visita = filter_input(INPUT_GET,'sintoma');
    $especificacion = filter_input(INPUT_GET,'observaciones');
    $parte_del_cuerpo_afectada = filter_input(INPUT_GET,'parte');
    $cie_10 = filter_input(INPUT_GET,'cie');
    $medicamento = filter_input(INPUT_GET,'medicamento');
    $hora = filter_input(INPUT_GET,'hora');

    $query1 = "SELECT idcie FROM cie_ WHERE descripcion='$cie_10' OR codigo='$cie_10'";
    $resultado1 = pg_query($conexion, $query1);
    $row = pg_fetch_array($resultado1);
    $cie10Cons = $row[0];

    //respuesta al ajax
    $arrRespuesta = [];

    if($cie10Cons != FALSE){
        $query = "INSERT INTO paciente_(fecha_consulta, nombre, edad, genero, especificacion, medicamento, fk_idsub_area, fk_idsintoma, fk_idparte_afectada, fk_idunidad, fk_idarea, fk_idclasificacion_inicial, fk_cie, hora)
        VALUES ('$fecha', '$nombre', '$edad', '$genero', '$especificacion', '$medicamento', '$sub_area', '$sintoma_inicial_de_visita', '$parte_del_cuerpo_afectada', '$unidad_de_negocio','$area', '$clasificacion_inicial', '$cie10Cons', '$hora')";
        $resultado = pg_query($conexion, $query);

        $bandera=1;
    }else{
        $bandera=0;
    }
    
    $arrRespuesta["bandera"]=$bandera;
    echo json_encode($arrRespuesta);
    pg_close($conexion);
?>