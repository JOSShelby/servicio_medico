<!DOCTYPE HTML>
<html lang="es">
    <head>
    <!-- cache -->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Control de consultas médicas</title>
    </head>
    <body class="pagina">
        <!-- <img class="imgPitido" src="../img/pitido.gif"> -->
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
                <h2 class="Indicaciones">BIENVENIDO</h2>
            </div>
        </div>
        <div class="separador"></div>   
        <form action="./agregar.php">
            <div class="d-flex justify-content-center">
                <button class="BTNAgregar" title="AGREGAR UN PACIENTE NUEVO">Agregar paciente</button>
            </div>
        </form>
        <form action="./consultar.php">
            <div class="d-flex justify-content-center">
                <button class="BTNConsultar" title="CONSULTAR PACIENTES">Consultar paciente</button>
            </div>
        </form>
        <form action="./index.php">
            <div class="d-flex justify-content-center">
                <button class="BTNSalir" title="SALIR DE LA PAGINA">Salir</button>
            </div>
        </form>
        <div class="separador"></div>  
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