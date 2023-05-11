<?php

    include 'conexion.php';

    $bandera=0;

    $campo_fecha = filter_input(INPUT_GET,"fecha");
    $campo_fechaFin = filter_input(INPUT_GET,"fechaFin");
    $campo_nombre = filter_input(INPUT_GET,"nombre");
    $campo_edad = filter_input(INPUT_GET,"edad");
    $campo_genero = filter_input(INPUT_GET,"genero");

    //respuesta al ajax
    $arrRespuesta = [];
    $arrayPacientes = [];
    $cadenaTexto ="";
    if ($campo_fecha != "" && $campo_fechaFin != "" && $campo_nombre !="" && $campo_edad !="" && $campo_genero !=""){
        $cadenaTexto="p.fecha_consulta BETWEEN '".$campo_fecha."' and '".$campo_fechaFin."' and p.nombre iLIKE '%".$campo_nombre."%' and p.edad = '".$campo_edad."' and p.genero = '".$campo_genero."' order by p.fecha_consulta";
        $bandera=1;
    }elseif($campo_fecha =="" && $campo_fechaFin=="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero !=""){
        $cadenaTexto="p.genero = '".$campo_genero."'";
        $bandera=1;
    }elseif($campo_fecha =="" && $campo_fechaFin=="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero ==""){
        $cadenaTexto="p.edad ='".$campo_edad."'";
        $bandera=1;
    }elseif($campo_fecha =="" && $campo_fechaFin=="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero ==""){
        $cadenaTexto="p.nombre iLIKE'%".$campo_nombre."%'";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin=="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero ==""){
        $cadenaTexto="p.fecha_consulta = '".$campo_fecha."' order by p.hora DESC";
        $bandera=1;
    }elseif($campo_fecha =="" && $campo_fechaFin=="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero !=""){
        $cadenaTexto="p.edad ='".$campo_edad."' and p.genero = '".$campo_genero."'";
        $bandera=1;
    }elseif($campo_fecha =="" && $campo_fechaFin=="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero !=""){
        $cadenaTexto="p.nombre iLIKE'%".$campo_nombre."%' and p.genero = '".$campo_genero."'";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin=="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero !=""){
        $cadenaTexto="p.fecha_consulta = '".$campo_fecha."' and p.genero = '".$campo_genero."'";
        $bandera=1;
    }elseif($campo_fecha =="" && $campo_fechaFin=="" && $campo_nombre !="" && $campo_edad !="" && $campo_genero ==""){
        $cadenaTexto="p.nombre iLIKE'%".$campo_nombre."%' and p.edad ='".$campo_edad."'";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin=="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero ==""){
        $cadenaTexto="p.fecha_consulta = '".$campo_fecha."' and p.edad ='".$campo_edad."'";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin=="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero ==""){
        $cadenaTexto="p.fecha_consulta = '".$campo_fecha."' and p.nombre iLIKE'%".$campo_nombre."%'";
        $bandera=1;
    }elseif($campo_fecha =="" && $campo_fechaFin=="" && $campo_nombre !="" && $campo_edad !="" && $campo_genero !=""){
        $cadenaTexto="p.nombre iLIKE'%".$campo_nombre."%' and p.edad ='".$campo_edad."' and p.genero = '".$campo_genero."'";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin=="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero !=""){
        $cadenaTexto="p.fecha_consulta = '".$campo_fecha."' and p.edad ='".$campo_edad."' and p.genero = '".$campo_genero."'";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin=="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero !=""){
        $cadenaTexto="p.fecha_consulta = '".$campo_fecha."' and p.nombre iLIKE'%".$campo_nombre."%' and p.genero = '".$campo_genero."'";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin=="" && $campo_nombre !="" && $campo_edad !="" && $campo_genero ==""){
        $cadenaTexto="p.fecha_consulta = '".$campo_fecha."' and p.nombre iLIKE'%".$campo_nombre."%' and p.edad = '".$campo_edad."'";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin !="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero==""){
        $cadenaTexto="p.fecha_consulta BETWEEN '".$campo_fecha."' and '".$campo_fechaFin."' order by p.fecha_consulta DESC";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin !="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero==""){
        $cadenaTexto="p.fecha_consulta BETWEEN '".$campo_fecha."' and '".$campo_fechaFin."' and p.nombre iLIKE'%".$campo_nombre."%' order by p.fecha_consulta DESC";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin !="" && $campo_nombre !="" && $campo_edad !="" && $campo_genero==""){
        $cadenaTexto="p.fecha_consulta BETWEEN '".$campo_fecha."' and '".$campo_fechaFin."' and p.nombre iLIKE'%".$campo_nombre."%' and p.edad = '".$campo_edad."' order by p.nombre DESC";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin !="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero!=""){
        $cadenaTexto="p.fecha_consulta BETWEEN '".$campo_fecha."' and '".$campo_fechaFin."' and p.nombre iLIKE'%".$campo_nombre."%' and p.genero = '".$campo_genero."' order by p.nombre DESC";
        $bandera=1;
    }elseif($campo_fecha =="" && $campo_fechaFin!="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero ==""){
        $cadenaTexto="p.fecha_consulta = '".$campo_fechaFin."' order by p.hora DESC";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin !="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero!=""){
        $cadenaTexto="p.fecha_consulta BETWEEN '".$campo_fecha."' and '".$campo_fechaFin."' and p.genero = '".$campo_genero."' order by p.nombre DESC";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin !="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero!=""){
        $cadenaTexto="p.fecha_consulta BETWEEN '".$campo_fecha."' and '".$campo_fechaFin."' and p.edad = '".$campo_edad."'  and p.genero = '".$campo_genero."' order by p.nombre DESC";
        $bandera=1;
    }elseif($campo_fecha !="" && $campo_fechaFin !="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero==""){
        $cadenaTexto="p.fecha_consulta BETWEEN '".$campo_fecha."' and '".$campo_fechaFin."' and p.edad = '".$campo_edad."' order by p.nombre DESC";
        $bandera=1;
    }

    if ($bandera==1){
         $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
        p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
        from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
        where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
        and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and ".$cadenaTexto."";
        $conexionbuscar = pg_query($conexion, $query);
        $noRows = pg_num_rows($conexionbuscar);
        $arrRespuesta["numero_columnas"] = $noRows;
    
        for ($indice=0; $indice < $noRows; $indice++){
            $res = pg_fetch_row($conexionbuscar);
            $arrayPacientes[$indice] = $res;
        }
    
        $bandera2 = 1;
        $arrRespuesta["pacientes"]= $arrayPacientes;
    }else{
        $bandera2 = 0;
    }
    $arrRespuesta["bandera"] = $bandera2;
    echo json_encode($arrRespuesta);
?>