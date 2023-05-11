<?php


include 'conexion.php';

$id = filter_input(INPUT_GET,"id");
$unidad_de_negocio = filter_input(INPUT_GET,"unidad");
$nombre = filter_input(INPUT_GET,"nombre");
$edad = filter_input(INPUT_GET,"edad");
$genero = filter_input(INPUT_GET,"genero");
$area = filter_input(INPUT_GET,"area");
$sub_area = filter_input(INPUT_GET,"subArea");
$clasificacion_inicial = filter_input(INPUT_GET,"clasificacion");
$sintoma_inicial_de_visita = filter_input(INPUT_GET,"sintoma");
$especificacion = filter_input(INPUT_GET,"observaciones");
$parte_del_cuerpo_afectada = filter_input(INPUT_GET,"parte");
$cie_10 = filter_input(INPUT_GET,"cie");
$medicamento = filter_input(INPUT_GET,"medicamento");

$query1 = "SELECT idcie FROM cie_ WHERE descripcion='$cie_10' OR codigo='$cie_10'";
$resultado1 = pg_query($conexion, $query1);
$row = pg_fetch_array($resultado1);
$cie10Cons = $row[0];

//array de respuesta
$arrRespuesta = [];
$bandera=0;

if($cie10Cons != FALSE){
    
    $query = "UPDATE paciente_ SET nombre = '$nombre', edad = '$edad', genero = '$genero',
    especificacion = '$especificacion', medicamento = '$medicamento', fk_idsub_area = '$sub_area', fk_idsintoma = '$sintoma_inicial_de_visita',
    fk_idparte_afectada = '$parte_del_cuerpo_afectada', fk_idunidad = '$unidad_de_negocio', fk_idarea = '$area', fk_idclasificacion_inicial = '$clasificacion_inicial',
    fk_cie = '$cie10Cons' WHERE idpaciente = '$id'";
    pg_query($conexion, $query);
    $bandera=1;
}else{
   $bandera=0;
}

$arrRespuesta["bandera"] = $bandera;
echo json_encode($arrRespuesta);

pg_close($conexion);

?>