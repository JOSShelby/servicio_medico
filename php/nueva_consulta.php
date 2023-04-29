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

            $query1 = "SELECT u.unidad_negocio, a.area, sa.sub_area
            FROM paciente_ p, subarea_ sa, unidad_ u, area_ a, clasificacion_inicial_ cl, sintoma_inicial_ s, parte_afectada_ pa, cie_ ci
            WHERE p.fk_idsub_area = sa.idsub_area and p.fk_idunidad = u.idunidad and fk_idarea = a.idarea and fk_idclasificacion_inicial = cl.idclasificacion_inicial
            and fk_idsintoma = s.idsintoma and fk_idparte_afectada =pa.idparte_afectada and fk_cie = ci.idcie and p.idpaciente = '$id'";
            $resultados1 = pg_query($conexion, $query1);   
            $row = pg_fetch_assoc($resultados1);       
            $unidad1 = $row['unidad_negocio']; 
            $area1 = $row['area']; 
            $sub1 = $row['sub_area']; 

    
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
        <form id="frmNuevaConsulta" autocomplete="on">
        <input type="text" id="inpHora" name="inpHora" hidden="true">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <label class="Label1">* Fecha de consulta</label>
                        <input required="" id="inpFecha" title="INGRESA UNA FECHA DE CONSULTA" name="fecha" type="date" class="inputs" value="<?php echo date("Y-m-d");?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">* Nombre completo</label>
                        <input required="" id="inpNombre" title="INGRESA NOMBRE DEL PACIENTE" name="nombre" type="text" class="inputs" value="<?=$nombre?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Edad</label>                       
                        <input required="" id="inpEdad" title="INGRESA EDAD DEL PACIENTE" name="edad" type="text" class="inputs" maxlength="2" pattern="[0-9]+" value="<?=$edad?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Género</label>
                            <select id="inpGenero" title="SELECCIONA EL GENERO DEL PACIENTE" name="genero" class="inputs" value="<?=$genero?>">
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
                        <select id="inpUnidadNegocio" title="SELECCIONA UNIDAD DE NEGOCIO" name="unidad_de_negocio" class="inputs" value="<?=$unidad?>">
                        <option Value="<?=$unidad ?>"><?=$unidad1?></option>
                            <?php echo $option_unidad;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Area</label>
                        <select id="inpArea" name="area" title="SELECCIONA EL AREA" class="inputs" onkeypress="seleccionAreaNuevaConsulta(this)"  onclick="seleccionAreaNuevaConsulta(this)">
                        <option Value="<?=$area ?>"><?=$area1?></option>
                            <?php echo $option_area;?>
                        </select>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Sub area</label>
                        <select id="inpSubArea" title="SELECCIONA EL SUBAREA" name="sub_area" class="inputs" value=0>
                            <option Value="<?=$sub ?>"><?=$sub1?></option>
                            <?php //echo $option_sub_area;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Clasificación inicial</label>
                        <select id="inpClasificacion" title="SELECCIONA LA CLASIFICACION INICIAL" name="clasificacion_inicial" class="inputs">
                            <?php echo $option_clasificacion;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Sintoma inicial de visita</label>
                        <select id="inpSintoma" title="SELECCIONA EL SINTOMA DEL PACIENTE" name="sintoma_inicial_de_visita" class="inputs">
                            <?php echo $option_sintoma;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Parte del cuerpo afectada</label>
                        <select id="inpParteAfectada"  title="SELECCIONA LA PARTE AFECTADA DEL PACIENTE" name="parte_del_cuerpo_afectada" class="inputs">
                            <?php echo $option_parte;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Observaciones</label>
                        <input id="inpObservaciones" title="INGRESA OBSERVACIONES" name="especificacion" class="inputs">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Medicamento preescrito</label>
                    <input id="inpMedicamento" title="INGRESA EL MEDICAMENTO"  name="medicamento" class="inputs">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label class="Label2">* CIE 10</label>    
                    <input id="inpCie" list="cie10" title="INGRESA EL CIE" class="inputLargo" name="cie_10" required="" autocomplete="off">
                    <datalist id="cie10">
                        <?php echo $option_cie;?>
                        </datalist>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a name="Boton guardar" class="button" title="GUARDAR EL REGISTRO" onclick="pacienteNuevo()"><span class="button__text">Guardar</span>
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
    document.getElementById('inpHora').value=h+":"+m+":"+s;
    t=setTimeout('startTime()',500);}
    function checkTime(i)
    {if (i<10) {i="0" + i;}return i;}
    window.onload=function(){startTime();
}
</script>
