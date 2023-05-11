<?php
include './conexion.php';
?> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/style_consultar_datos.css" rel="stylesheet" type="text/css">
            <thead class="tabla">
                <tr>
                    <th class="enca">Id</th>
                    <th class="enca">Fecha de consulta</th>
                    <th class="enca">Unidad de negocio</th>
                    <th class="enca">Nombre completo</th>
                    <th class="enca">Edad</th>
                    <th class="enca">Genero</th>
                    <th class="enca">Area</th>
                    <th class="enca">Sub area</th>
                    <th class="enca">Clasificación inicial</th>
                    <th class="enca">Sintoma inicial de visita</th>
                    <th class="enca">Especificación ¿Qué tipo?</th>
                    <th class="enca">Parte del cuerpo afectada</th>
                    <th class="enca">CIE 10</th>
                    <th class="enca">Código</th>
                    <th class="enca">Medicamento preescrito</th>
                    <th class="enca"></th>
                    <th class="enca"></th>
                </tr>
            </thead>
            <?php 
            
            $campo_fecha = $_POST['fecha'];
            $campo_nombre = $_POST['nombre'];
            $campo_edad = $_POST['edad'];
            $campo_genero = $_POST['genero'];
                if ($campo_fecha != "" && $campo_nombre !="" && $campo_edad !="" && $campo_genero !=""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.nombre iLIKE'%".$campo_nombre."%'
                    and p.edad = '$campo_edad' and p.genero = '$campo_genero' order by p.fecha_consulta";
                }elseif($campo_fecha =="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero !=""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.genero = '$campo_genero'";
                }elseif($campo_fecha =="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero ==""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.edad iLIKE'%".$campo_edad."%'";
                }elseif($campo_fecha =="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero ==""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.nombre iLIKE'%".$campo_nombre."%'";
                }elseif($campo_fecha !="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero ==""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha'";
                }elseif($campo_fecha =="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero !=""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.edad iLIKE'%".$campo_edad."%' and p.genero = '$campo_genero'";
                }elseif($campo_fecha =="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero !=""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.nombre iLIKE'%".$campo_nombre."%' and p.genero = '$campo_genero'";
                }elseif($campo_fecha !="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero !=""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.genero = '$campo_genero'";
                }elseif($campo_fecha =="" && $campo_nombre !="" && $campo_edad !="" && $campo_genero ==""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.nombre iLIKE'%".$campo_nombre."%' and p.edad iLIKE'%".$campo_edad."%'";
                }elseif($campo_fecha !="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero ==""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.edad iLIKE'%".$campo_edad."%'";
                }elseif($campo_fecha !="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero ==""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.nombre iLIKE'%".$campo_nombre."%'";
                }elseif($campo_fecha =="" && $campo_nombre !="" && $campo_edad !="" && $campo_genero !=""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.nombre iLIKE'%".$campo_nombre."%' and p.edad iLIKE'%".$campo_edad."%' and p.genero = '$campo_genero'";
                }elseif($campo_fecha !="" && $campo_nombre =="" && $campo_edad !="" && $campo_genero !=""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.edad iLIKE'%".$campo_edad."%' and p.genero = '$campo_genero'";
                }elseif($campo_fecha !="" && $campo_nombre !="" && $campo_edad =="" && $campo_genero !=""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.nombre iLIKE'%".$campo_nombre."%'
                    and p.genero = '$campo_genero'";
                }elseif($campo_fecha !="" && $campo_nombre !="" && $campo_edad !="" && $campo_genero ==""){
                    $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.nombre iLIKE'%".$campo_nombre."%'
                    and p.edad iLIKE'%".$campo_edad."%'";
                }elseif($campo_fecha =="" && $campo_nombre =="" && $campo_edad =="" && $campo_genero ==""){
                    echo'
                        <script>
                        alert("Sin resultados. Llene al menos un campo");
                        window.location = "../html/consultar.php";
                        </script>
                    ';

                    // $query = "select p.idpaciente,p.fecha_consulta, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
                    // p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
                    // from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
                    // where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
                    // and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.fecha_consulta = '$campo_fecha' and p.nombre iLIKE'%".$campo_nombre."%'
                    // and p.edad iLIKE'%".$campo_edad."%' and p.genero = '$campo_genero' order by p.fecha_consulta";
                }
                $resultados = pg_query($conexion, $query);
                $i = 0;
                while ($row = pg_fetch_array($resultados)){
                $i++?>  
            <tr>
                <td class="colspan=4 enca" id="id_idpaciente"><?=$i?></td>
                <p><td class="colspan=4 enca" id="id_fecha"><?php echo $row[1] ?></td></p>
                <p><td class="colspan=4 enca" id="id_unidad"><?php echo $row[2] ?></td></p>
                <p><td class="colspan=4 enca" id="id_nombre"><?php echo $row[3] ?></td></p>
                <p><td class="colspan=4 enca" id="id_edad"><?php echo $row[4] ?></td></p>
                <p><td class="colspan=4 enca" id="id_genero"><?php echo $row[5] ?></td></p>
                <p><td class="colspan=4 enca" id="id_area"><?php echo $row[6] ?></td></p>
                <p><td class="colspan=4 enca" id="id_sub_area"><?php echo $row[7] ?></td></p>
                <p><td class="colspan=4 enca" id="id_clasificacion"><?php echo $row[8] ?></td></p>
                <p><td class="colspan=4 enca" id="id_sintoma"><?php echo $row[9] ?></td></p>
                <p><td class="colspan=4 enca" id="id_especificacion"><?php echo $row[10] ?></td></p>
                <p><td class="colspan=4 enca" id="id_parte"><?php echo $row[11] ?></td></p>
                <p><td class="colspan=4 enca" id="id_descripcion"><?php echo $row[12] ?></td></p>
                <p><td class="colspan=4 enca" id="id_codigo"><?php echo $row[13] ?></td></p>
                <p><td class="colspan=4 enca" id="id_medicamento"><?php echo $row[14] ?></td></p>
                <td  id="id_BTNEliminar"><a href="./editar_datos.php?t=<?=$row[0]?>"><button class="btn btn-outline-primary encab_"><img src="../img/editar.png" height ="20" width="20" /></button></a></td>
                <td id="id_BTNEliminar"><a href="./eliminar_datos.php?t=<?=$row[0]?>"><button class="btn btn-outline-danger encab_"><img src="../img/eliminar.png" height ="20" width="20" /></button></a></td>
                <p></p>
            </tr>
            <?php } 