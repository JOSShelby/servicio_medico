<?php
    include 'conexion.php';
    include "./listas_desplegables.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- cache -->
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="../css/style_agregar.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="../funciones/funciones.js"></script>
        <script type="text/javascript" src="../funciones/alerts/alerts.js"></script>
        <title>Control de consultas médicas</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="pagina">
        <div class="rectangulo_encabezado">
            <div class="d-flex justify-content-end">
                <label class="dia"><?php echo date("d-m-Y");?></label>
            </div>
            <div class="d-flex justify-content-end">
                <div id="reloj" class="reloj"></div>
            </div>
            <div class="d-flex justify-content-center">
                <h1 class="Titulo">Servicio médico</h1>
            </div>
            <div class="d-flex justify-content-center">
                <h2 class="Indicaciones">(Llena los campos empezando con mayúscula)</h2>
            </div>
        </div>   
        <form action="../html/inicio.php">
            <div class="d-flex justify-content-end">
                <button class="BTNRegresar" title="VOLVER AL INICIO" type="submit"><img src="../img/home.png" height ="20" width="20"/></button>
            </div>
        </form>
        <form action="../html/consultar.php">
            <div class="d-flex justify-content-end">
                <button class="BTNVolver" title="REGRESAR A PAGINA ANTERIOR" type="submit"><img src="../img/volver.png" height ="20" width="30"/></button>
            </div>
        </form>
        <div class="separador"></div>
        <?php
            $id = $_GET["t"];
            $query1 = "SELECT u.unidad_negocio, a.area, sa.sub_area, cl.clasificacion_inicial, s.sintoma_inicial, pa.parte_del_cuerpo_afectada, ci.descripcion
            FROM paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
            WHERE p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
            and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.idpaciente = '$id'";
            $resultados1 = pg_query($conexion, $query1);   
            $row = pg_fetch_assoc($resultados1);       
            $unidad1 = $row['unidad_negocio']; 
            $area1 = $row['area']; 
            $sub1 = $row['sub_area']; 
            $clasificacion1 = $row['clasificacion_inicial']; 
            $sintoma1 = $row['sintoma_inicial'];                 
            $parte1 = $row['parte_del_cuerpo_afectada']; 
            $cie1 = $row['descripcion']; 
    
            /////////////////////////////////////////

            $query = "SELECT idpaciente, fecha_consulta, nombre, edad, genero, especificacion, medicamento, fk_idsub_area, fk_idsintoma, fk_idparte_afectada, fk_idunidad, fk_idarea, fk_idclasificacion_inicial, fk_cie
            FROM paciente_ WHERE idpaciente = '$id'";

            $resultados = pg_query($conexion, $query);   
            $row = pg_fetch_assoc($resultados);       
            $fecha = $row['fecha_consulta']; 
            $unidad = $row['fk_idunidad']; 
            $nombre = $row['nombre']; 
            $edad = $row['edad']; 
            $genero = $row['genero']; 
            $area = $row['fk_idarea']; 
            $sub = $row['fk_idsub_area']; 
            $clasificacion = $row['fk_idclasificacion_inicial']; 
            $sintoma = $row['fk_idsintoma'];                 
            $especificacion = $row['especificacion']; 
            $parte = $row['fk_idparte_afectada']; 
            $cie = $row['fk_cie']; 
            $medicamento = $row['medicamento']; 
        ?>
        <form method="post" id="frmEditarDatos" action="./update_datos.php?t=<?=$row['idpaciente']?>" autocomplete="on">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <label class="Label1">* Fecha de consulta</label>
                        <input id="inpFechaEdit"  required="" name="fecha" type="date" class="inputs" value="<?=$fecha?>" disabled="disabled">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">* Nombre completo</label>
                        <input id="inpNombreEdit" title="INGRESA NOMBRE DEL PACIENTE" required="" name="nombre" type="text" class="inputs" value="<?=$nombre?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">* Edad</label>                       
                        <input id="inpEdadEdit" title="INGRESA LA EDAD EL PACIENTE" required="" name="edad"  type="number" class="inputs" max="100" min="1" value="<?=$edad?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Género</label>
                            <select id="inpGeneroEdit" title="SELECCIONA EL GENERO DEL PACIENTE" name="genero" class="inputs" value="<?=$genero?>">
                            <option Value="<?=$genero ?>"><?=$genero?></option>
                            <option>...</option>
                            <option Value="Hombre">Hombre</option>
                            <option Value="Mujer">Mujer</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Unidad de negocio</label>
                        <select id="inpUnidadEdit" title="SELECCIONA LA UNIDAD DE NEGOCIO" name="unidad_de_negocio" class="inputs">
                            <option Value="<?=$unidad ?>"><?=$unidad1?></option>
                            <?php echo $option_unidad;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Area</label>
                        <select id="inpArea" title="SELECCIONA EL AREA" name="area" class="inputs" onkeypress="seleccionAreaEdit(this)"  onclick="seleccionAreaEdit(this)">
                        <option Value="<?=$area ?>"><?=$area1?></option>
                            <?php echo $option_area;?>
                        </select>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Sub area</label>
                        <select id="inpSubArea" title="SELECCIONA LA SUBAREA" name="sub_area" class="inputs" value=0>
                            <option Value="<?=$sub ?>"><?=$sub1?></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Clasificación inicial</label>
                        <select id="inpClasificacionEdit" title="SELECCIONA LA CLASIFICACION INICIAL" name="clasificacion_inicial" class="inputs">
                            <option Value="<?=$clasificacion ?>"><?=$clasificacion1?></option>
                            <?php echo $option_clasificacion;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Sintoma inicial de visita</label>
                        <select id="inpSintomaEdit" title="SELECCIONA EL SINTOMA DEL PACIENTE" name="sintoma_inicial_de_visita" class="inputs">
                        <option Value="<?=$sintoma ?>"><?=$sintoma1?></option>
                            <?php echo $option_sintoma;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Parte del cuerpo afectada</label>
                        <select id="inpParteEdit" title="SELECCIONA LA PARTE AFECTADA DEL PACIENTE" name="parte_del_cuerpo_afectada" class="inputs">
                            <option Value="<?=$parte ?>"><?=$parte1?></option>
                            <?php echo $option_parte;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Observaciones</label>
                        <input id="inpOservacionesEdit" title="INGRESA LAS OBSERVACIONES" name="especificacion" class="inputs" value="<?=$especificacion?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Medicamento preescrito</label>
                        <input id="inpMedicamentoEdit" title="INGRESA EL MEDICAMENTO" name="medicamento" class="inputs" value="<?=$medicamento?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label class="Label2">* CIE 10</label>    
                    <input id="inpCieEdit" title="INGRESA EL CIE" list="cie10" class="inputLargo" name="cie_10" required=""  value="<?=$cie1?>" autocomplete="off">
                    <datalist id="cie10">
                        <?php echo $option_cie;?>
                        </datalist>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <input id="inpId" type="text" value="<?=$id?>" hidden>
                <a id="btnGuardarEdit" class="button" title="GUARDAR EL REGISTRO" onclick="validaCamposEditar()"><span class="button__text">Guardar</span>
            <span class="button__icon"><img class="imgFiltro" src="../img/guardar.png" height=30px width=30px style="color: white;"></span></a>
            </div>
            <div class="separador"></div>
        </form>
    </body>
    <?php pg_close($conexion);?>
</html>
<script>
    function startTime(){;
    today=new Date();
    h=today.getHours();
    m=today.getMinutes();
    s=today.getSeconds();
    m=checkTime(m);
    s=checkTime(s);
    document.getElementById('reloj').innerHTML=h+":"+m+":"+s;
    t=setTimeout('startTime()',500);}
    function checkTime(i)
    {if (i<10) {i="0" + i;}return i;}
    window.onload=function(){startTime();
}
</script>
