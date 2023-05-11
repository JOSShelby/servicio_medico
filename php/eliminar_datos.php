<?php

    include 'conexion.php';
    
    $arrRespuesta = [];

    $id = filter_input(INPUT_GET,"id");

    $query = "DELETE FROM paciente_ WHERE idpaciente ='$id'";
    pg_query($conexion, $query);
    $bandera =1;
    
    $arrRespuesta ["bandera"] = $bandera;
    echo json_encode($arrRespuesta);
    pg_close($conexion);
?>