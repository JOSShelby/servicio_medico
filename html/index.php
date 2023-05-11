<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../kudePOO/estilos/general.css" rel="stylesheet" type="text/css"/>
        <link href="../../kudePOO/estilos/alerts.css" rel="stylesheet" type="text/css"/>
        <script src="../../kudePOO/funciones/js/alerts.js" type="text/javascript"></script>
        <title>TI & Telecomunicaciones (Grupo Zarattini)</title>

    <?php
     include '../php/conexion.php';
    ?>
    </head>
    <body>
        <?php 
            if (filter_input_array(INPUT_POST)){
                $usuarioLogon=filter_input(INPUT_POST,'usuario');
                $usuarioPassword=filter_input(INPUT_POST,'password');
                //echo $usuarioLogon;
                $query = "SELECT * from usuario_ WHERE username = '".$usuarioLogon."' AND userpassword = md5( '".$usuarioPassword."')";
                //echo $query;
                $resultado = pg_query($conexion, $query);
                $noRows= pg_num_rows($resultado);
                //echo $noRows;
        
                if ($noRows==0){
                    print_r("<script type=\"text/javascript\" lang=\"javascript\"> "
                    ."alertImageIndex(\"¡ERROR!\",\"Usuario no encontrado en la DB.\",\"error\")"
                    ."</script>");
                    
                }else{
                    header('Location: http://'.$_SERVER['HTTP_HOST'].'/servicio_medico/html/inicio.php');
                }
            }else{
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/TI/');
            }
        ?>
    </body>
</html>
