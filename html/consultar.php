<?php
    include '../php/listas_desplegables.php'
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="../css/style_consultar.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="../funciones/funciones.js"></script>
        <script type="text/javascript" src="../funciones/Excel/tablaExcel.js"></script>
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
                <h2 class="Indicaciones">Consultar</h2>
            </div>
        </div>
        <form action="./inicio.php">
        <div class="d-flex justify-content-end">
            <button class="BTNVolver" title="REGRESA A PAGINA ANTERIOR" type="submit"><img src="../img/volver.png" height ="20" width="30"/></button> 
        </div>
        </form>
        <div class="separador"></div>
        <form id="frmConsultar" autocomplete="off">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <label class="Label1">Fecha Inicio</label>
                        <input id="idFecha" title="INGRESA FECHA A BUSCAR" name="fecha" type="date" class="inputs" onchange="buscarPaciente()" value="<?php //echo date("Y-m-d");?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Fecha Fin</label>
                        <input id="idFechaFin" title="INGRESA FECHA A BUSCAR" name="fechaFin" type="date" class="inputs" onchange="buscarPaciente()" value="<?php //echo date("Y-m-d");?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Nombre</label>
                        <input id="idNombre" title="INGRESA NOMBRE A BUSCAR" class="inputs" name="nombre" onkeyup="buscarPaciente()">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Edad</label>
                        <input id="idEdad" title="INGRESA EDAD A BUSCAR" name="edad" type="text" class="inputs" pattern="[0-9]+" maxlength="2" onkeyup="buscarPaciente()">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="Label1">Género</label>
                        <select id="idGenero" title="SELECCIONA GENERO A BUSCAR" name="genero" class="inputs" onchange="buscarPaciente()">
                            <option ></option>
                            <option Value="Hombre">Hombre</option>
                            <option Value="Mujer">Mujer</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- <div class="d-flex justify-content-center">
                <a name="Boton buscar" class="BTNBuscar" onclick="buscarPaciente()">Buscar paciente <img src="../img/buscar.png" height ="35" width="30"/></a>
            </div> -->
        </form>
        <!-- <form action="../php/generarexel.php">
            <div class="d-flex justify-content-center">
                <button name="Boton buscar" class="BTNExcel"><img src="../img/excel.png" height ="35" width="30"/> de todos los pacientes</button>
            </div>
        </form>-->
        <div class="d-flex justify-content-center">            
                <a  id="btnGenerarExcel" onclick="exportTableToExcel('idTablaPacientesOculta')" class="button" title="DESCARGAR EXCEL DE LOS RESULTADOS"><span class="button__text">Generar</span>
                <span class="button__icon"><img class="imgFiltro" src="../img/excel.png" height=30px width=30px/></span></a>    
        </div>
        <div class="separador2"><p></p></div>
        <table id="idTablaPacientes" class="table table-hover"></table>

        <div hidden><table border="1" hidden id="idTablaPacientesOculta" class="table table-hover"></table></div>
    </body>
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
