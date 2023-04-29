<?php
    include 'conexion.php';

//////
    $option_unidad="";
    $query = "SELECT * FROM unidad_ where status=2 ORDER BY idunidad";
    $resultados = pg_query($conexion, $query);
    while ($lista_unidad = pg_fetch_assoc($resultados)){
        $id_unidad = $lista_unidad['idunidad'];
        $unidad_negocio = $lista_unidad['unidad_negocio'];
        $option_unidad .= "<option value=\"$id_unidad\">$unidad_negocio</option>";
    }
//////
    $option_area="";
    $query2 = "SELECT * FROM area_ where status=2 ORDER BY idarea";
    $resultados = pg_query($conexion, $query2);
    while ($lista_area = pg_fetch_assoc($resultados)){
        $id_area = $lista_area['idarea'];
        $area = $lista_area['area'];
        $option_area .= "<option value=\"$id_area\">$area</option>";
    }
//////
    $option_sub_area="";
    $query3 = "SELECT * FROM subarea_ where status=2 ORDER BY idsub_area";
    $resultados = pg_query($conexion, $query3);
    while ($lista_sub_area = pg_fetch_assoc($resultados)){
        $id_sub_area = $lista_sub_area['idsub_area'];
        $sub_area = $lista_sub_area['sub_area'];
        $option_sub_area .= "<option value=\"$id_sub_area\">$sub_area</option>";
    }
//////
    $option_clasificacion="";
    $query4 = "SELECT * FROM clasificacion_inicial_ ORDER BY idclasificacion_inicial";
    $resultados = pg_query($conexion, $query4);
    while ($lista_clasificacion = pg_fetch_assoc($resultados)){
        $id_clasificacion = $lista_clasificacion['idclasificacion_inicial'];
        $clasificacion = $lista_clasificacion['clasificacion_inicial'];
        $option_clasificacion .= "<option value=\"$id_clasificacion\">$clasificacion</option>";
    }
//////
    $option_sintoma="";
    $query5 = "SELECT * FROM sintoma_inicial_  where status=2 ORDER BY idsintoma";
    $resultados = pg_query($conexion, $query5);
    while ($lista_sintoma = pg_fetch_assoc($resultados)){
        $id_sintoma = $lista_sintoma['idsintoma'];
        $sintoma = $lista_sintoma['sintoma_inicial'];
        $option_sintoma .= "<option value=\"$id_sintoma\">$sintoma</option>";
    }
//////
    $option_parte="";
    $query6 = "SELECT * FROM parte_afectada_ where status=2 ORDER BY idparte_afectada";
    $resultados = pg_query($conexion, $query6);
    while ($lista_parte = pg_fetch_assoc($resultados)){
        $id_parte = $lista_parte['idparte_afectada'];
        $parte = $lista_parte['parte_del_cuerpo_afectada'];
        $option_parte .= "<option value=\"$id_parte\">$parte</option>";
    }
//////
    $option_cie="";
    $query7 = "SELECT * FROM cie_ ORDER BY idcie";
    $resultados = pg_query($conexion, $query7);
    while ($lista_cie = pg_fetch_assoc($resultados)){
        $id_cie = $lista_cie['idcie'];
        $codigo = $lista_cie['codigo'];
        $cie = $lista_cie['descripcion'];
        $option_cie .= "<option value=\"$cie\"></option>";
    }
//////
    $option_nombre="";
    $query8 = "SELECT nombre FROM paciente_ ORDER BY nombre";
    $resultados = pg_query($conexion, $query8);
    while ($lista_nombre = pg_fetch_assoc($resultados)){
        $nombre = $lista_nombre['nombre'];
        $option_nombre .= "<option value=\"$nombre\"></option>";
    }
//////
// pg_close($conexion);
?>