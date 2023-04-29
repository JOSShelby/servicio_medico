<?php
    include '../../php/conexion.php';
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=Atencion_medica_" . date('d:m:Y') . ".xls");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1">
    <caption>DATOS DE LOS PACIENTES</caption>
        <tr style="color:#FF0000">
            <th>Id</th>
            <th>Fecha de consulta</th>
            <th>Hora de consulta</th>
            <th>Unidad de negocio</th>
            <th>Nombre completo</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Area</th>
            <th>Sub area</th>
            <th>Clasificación inicial</th>
            <th>Sintoma inicial de visita</th>
            <th>Especificación ¿Qué tipo?</th>
            <th>Parte del cuerpo afectada</th>
            <th>CIE 10</th>
            <th>Código</th>
            <th>Medicamento preescrito</th>
        </tr>
        <?php 
            $query = "select p.idpaciente,p.fecha_consulta,p.hora, u.unidad_negocio, p.nombre, p.edad, p.genero, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial,
            p.especificacion, pa.parte_del_cuerpo_afectada, ci.descripcion, ci.codigo, p.medicamento
            from paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
            where p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
            and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie order by p.fecha_consulta";
            $resultados = pg_query($conexion, $query);
            $i = 0;
            while ($row = pg_fetch_array($resultados)){
            $i++?>  
        <tr >
            <td><?=$i?></td>
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
            <td><?php echo $row[3] ?></td>
            <td><?php echo $row[4] ?></td>
            <td><?php echo $row[5] ?></td>
            <td><?php echo $row[6] ?></td>
            <td><?php echo $row[7] ?></td>
            <td><?php echo $row[8] ?></td>
            <td><?php echo $row[9] ?></td>
            <td><?php echo $row[10] ?></td>
            <td><?php echo $row[11] ?></td>
            <td><?php echo $row[12] ?></td>
            <td><?php echo $row[13] ?></td>
            <td><?php echo $row[14] ?></td>
            <td><?php echo $row[15] ?></td>
        </tr>
        <?php } 
        pg_close($conexion);?>
</table>