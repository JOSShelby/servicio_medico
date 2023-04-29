<?php
include "../php/listas_desplegables.php";
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de consultas médicas</title>
</head>

<body class="pagina">
<!-- <img class="imgPitido" src="../img/pitido.gif"> -->
    <div class="rectangulo_encabezado">
        <div class="d-flex justify-content-end">
            <label class="dia"><?php echo date("d-m-Y"); ?></label>
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
    <form action="./inicio.php">
        <div class="d-flex justify-content-end">
            <button class="BTNVolver" type="submit" title="REGRESAR PAGINA ANTERIOR"><img src="../img/volver.png" height="20" width="30" /></button>
        </div>
    </form>
    <div class="separador"></div>
    <!-- <form id="frmAgregar" method="post" action="../php/insertar_datos.php" autocomplete="on"> -->
    <form id="frmAgregar" autocomplete="on">
        <input type="text" id="inpHora" name="inpHora" hidden="true">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <label label class="Label1">* Fecha de consulta</label>
                    <input id="inpFecha" title="INGRESA LA FECHA DE CONSULTA" required="" name="fecha" type="date" class="inputs" value="<?php echo date("Y-m-d"); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">* Nombre completo</label>
                    <input id="inpNombre" title="INGRESA EL NOMBRE DEL PACIENTE" required="" name="nombre" type="text" class="inputs">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">* Edad</label>
                    <input id="inpEdad" title="INGRESA LA EDAD DEL PACIENTE" required="" name="edad" type="number" class="inputs" min="1" max="100">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">Género</label>
                    <select id="inpGenero" title="SELECCIONA EL GENERO DEL PACIENTE" name="genero" class="inputs">
                        <option>...</option>
                        <option Value="Hombre">Hombre</option>
                        <option Value="Mujer">Mujer</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">Unidad de negocio</label>
                    <select id="inpUnidadNegocio" title="SELECCIONA LA UNIDAD DE NEGOCIO" name="unidad_de_negocio" class="inputs">
                        <?php echo $option_unidad; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">Area</label>
                    <select id="inpArea" name="area" title="SELECCIONA EL AREA" class="inputs" onkeypress="seleccionArea(this)" onclick="seleccionArea(this)">
                        <?php echo $option_area; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">Sub area</label>
                    <select id="inpSubArea" title="SELECCIONA LA SUBAREA" name="sub_area" class="inputs" value=0 disabled>
                        <option id="optionSubArea" value=0>...</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">Clasificación inicial</label>
                    <select id="inpClasificacion" title="SELECCIONA LA CLASIFICACION INICIAL" name="clasificacion_inicial" class="inputs">
                        <?php echo $option_clasificacion; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">Sintoma inicial de visita</label>
                    <select id="inpSintoma" title="SELECCIONA EL SINTOMA DEL PACIENTE" name="sintoma_inicial_de_visita" class="inputs">
                        <?php echo $option_sintoma; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">Parte del cuerpo afectada</label>
                    <select id="inpParteAfectada" title="SELECCIONA LA PARTE AFECTADA DEL PACIENTE" name="parte_del_cuerpo_afectada" class="inputs">
                        <?php echo $option_parte; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">Observaciones</label>
                    <input id="inpObservaciones" title="INGRESA LAS OBSERVACIONES" name="especificacion" class="inputs">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="Label1">Medicamento preescrito</label>
                    <input id="inpMedicamento" title="INGRESA EL MEDICAMENTO" name="medicamento" class="inputs">
                </div>
            </div>
            <div clas="row">
                <div class="col">
                    <label class="Label2">* CIE 10</label>
                    <input id="inpCie" list="cie10" class="inputLargo" title="INGRESA EL CIE" name="cie_10" id="cie_10" required="" autocomplete="off">
                    <datalist id="cie10">
                        <?php echo $option_cie; ?>
                    </datalist>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
        </div>
         <div class="d-flex justify-content-center">
                <a name="Boton guardar" class="button" title="GUARDAR EL REGISTRO" onclick="validarCamposAgregar()"><span class="button__text">Guardar</span>
                <span class="button__icon"><img class="imgFiltro" src="../img/guardar.png" height=30px width=30px style="color: white;"></span></a>
            </div>
        <div class="separador"></div>
    </form>
</body>

</html>
<script>
    function startTime() {
        ;
        today = new Date();
        h = today.getHours();
        m = today.getMinutes();
        s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('reloj').innerHTML = h + ":" + m + ":" + s;
        document.getElementById('inpHora').value = h + ":" + m + ":" + s;
        t = setTimeout('startTime()', 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    window.onload = function() {
        startTime();
    }
</script>