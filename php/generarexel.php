<?php
    include './conexion.php';
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=Atencion_medica_" . date('d:m:Y') . ".xls");

    $campo_fecha = $_POST['fecha'];
    $campo_nombre = $_POST['nombre'];
    $campo_edad = $_POST['edad'];
    $campo_genero = $_POST['genero'];

    //respuesta ajax
    $arrRespuesta = [];
    $bandera=0;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1">
    <caption>DATOS DE LOS PACIENTES</caption>
        <tr style="color:#fffefe">
            <th bgcolor="#000000">#</th>
            <th bgcolor="#000000">Fecha de consulta</th>
            <th bgcolor="#000000">Hora de consulta</th>
            <th bgcolor="#000000">Unidad de negocio</th>
            <th bgcolor="#000000">Nombre completo</th>
            <th bgcolor="#000000">Edad</th>
            <th bgcolor="#000000">Genero</th>
            <th bgcolor="#000000">Area</th>
            <th bgcolor="#000000">Sub area</th>
            <th bgcolor="#000000">Clasificación inicial</th>
            <th bgcolor="#000000">Sintoma inicial de visita</th>
            <th bgcolor="#000000">Observaciones</th>
            <th bgcolor="#000000">Parte del cuerpo afectada</th>
            <th bgcolor="#000000">CIE 10</th>
            <th bgcolor="#000000">Código</th>
            <th bgcolor="#000000">Medicamento preescrito</th>
        </tr>
        <?php 
    
            if ($campo_fecha != "" && $campo_nombre !="" && $campo_edad !="" && $campo_genero !=""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.nombre iLIKE'%".$campo_nombre."%'
                and p.edad = '$campo_edad' and p.genero = '$campo_genero' order by p.fecha_consulta";
                $bandera=1;
            }elseif($campo_fecha =="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero !=""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.genero = '$campo_genero'";
                $bandera=1;
            }elseif($campo_fecha =="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero ==""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.edad ='$campo_edad'";
                $bandera=1;
            }elseif($campo_fecha =="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero ==""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.nombre iLIKE'%".$campo_nombre."%'";
                $bandera=1;
            }elseif($campo_fecha !="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero ==""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' order by p.hora DESC";
                $bandera=1;
            }elseif($campo_fecha =="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero !=""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.edad ='$campo_edad' and p.genero = '$campo_genero'";
                $bandera=1;
            }elseif($campo_fecha =="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero !=""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.nombre iLIKE'%".$campo_nombre."%' and p.genero = '$campo_genero'";
                $bandera=1;
            }elseif($campo_fecha !="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero !=""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.genero = '$campo_genero'";
                $bandera=1;
            }elseif($campo_fecha =="" && $campo_nombre !="" && $campo_edad !="" && $campo_genero ==""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.nombre iLIKE'%".$campo_nombre."%' and p.edad ='$campo_edad'";
                $bandera=1;
            }elseif($campo_fecha !="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero ==""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.edad ='$campo_edad'";
                $bandera=1;
            }elseif($campo_fecha !="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero ==""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.nombre iLIKE'%".$campo_nombre."%'";
                $bandera=1;
            }elseif($campo_fecha =="" && $campo_nombre !="" && $campo_edad !="" && $campo_genero !=""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.nombre iLIKE'%".$campo_nombre."%' and p.edad ='$campo_edad' and p.genero = '$campo_genero'";
                $bandera=1;
            }elseif($campo_fecha !="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero !=""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.edad ='$campo_edad' and p.genero = '$campo_genero'";
                $bandera=1;
            }elseif($campo_fecha !="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero !=""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.nombre iLIKE'%".$campo_nombre."%'
                and p.genero = '$campo_genero'";
                $bandera=1;
            }elseif($campo_fecha !="" && $campo_nombre !="" && $campo_edad !="" && $campo_genero ==""){
                $query = "select p.idpaciente,p.fecha_consulta, p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.nombre iLIKE'%".$campo_nombre."%'
                and p.edad = '$campo_edad'";
                $bandera=1;
            }

            // $query = "select p.idpaciente,p.fecha_consulta,p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
            // p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
            // from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
            // where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
            // and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie order by p.fecha_consulta";

            $resultados = pg_query($conexion, $query);
            $i = 0;
            while ($row = pg_fetch_array($resultados)){
            $i++?>  
        <tr >
            <td bgcolor="#A4E17B"><?=$i?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[1] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[2] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[3] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[4] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[5] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[6] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[7] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[8] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[9] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[10] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[11] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[12] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[13] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[14] ?></td>
            <td bgcolor="#DCFEC2"><?php echo $row[15] ?></td>
        </tr>
        <?php } 

        $arrRespuesta["bandera"] = $bandera;
        echo json_encode($arrRespuesta);
        
        pg_close($conexion);?>
</table>