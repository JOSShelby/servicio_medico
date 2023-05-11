function seleccionArea(id){
    var idArea = id.value;
    // const data = new FormData(document.getElementById('frmAgregar'));
    const options = {
        method: "GET",
        // body : data
    }; 
    // Petición HTTP
    fetch("../php/agregarAJAX.php?idArea="+idArea, options)
        .then(response => response.json())
        .then(data => {
            // console.log(data)
            var formulario = document.getElementById("frmAgregar");
            var inpSubArea = formulario.inpSubArea;
            if(data["bandera"] > 0){
  
                //limpia el select
                inpSubArea.innerHTML = "";
                //habilita el select del sub area
                inpSubArea.removeAttribute("disabled");

                var arraySelects = data['selects'];
                var numColumnas = data['numero_columnas'];

                for (indice=0;indice<numColumnas;indice++){
                    var valor = arraySelects[indice][0];
                    var texto = arraySelects[indice][1];

                    var opcion = new Option;
                    opcion.value=valor;
                    opcion.text=texto;
                    inpSubArea.add(opcion);
                }
            }
            if(data["bandera"]==0){
                // console.log("entre");
                inpSubArea.innerHTML = "";
                var opcion = new Option;
                opcion.value=0;
                opcion.text='...';
                inpSubArea.add(opcion);
                inpSubArea.setAttribute("disabled",true);
            }
        });
}
function seleccionAreaEdit(id){
    var idArea = id.value;
    // const data = new FormData(document.getElementById('frmAgregar'));
    const options = {
        method: "GET",
        // body : data
    }; 
    // Petición HTTP
    fetch("../php/agregarAJAX.php?idArea="+idArea, options)
        .then(response => response.json())
        .then(data => {
            // console.log(data)
            var formulario = document.getElementById("frmEditarDatos");
            var inpSubArea = formulario.inpSubArea;
            if(data["bandera"] > 0){
  
                //limpia el select
                inpSubArea.innerHTML = "";
                //habilita el select del sub area
                inpSubArea.removeAttribute("disabled");

                var arraySelects = data['selects'];
                var numColumnas = data['numero_columnas'];

                for (indice=0;indice<numColumnas;indice++){
                    var valor = arraySelects[indice][0];
                    var texto = arraySelects[indice][1];

                    var opcion = new Option;
                    opcion.value=valor;
                    opcion.text=texto;
                    inpSubArea.add(opcion);
                }
            }
            if(data["bandera"]==0){
                // console.log("entre");
                inpSubArea.innerHTML = "";
                var opcion = new Option;
                opcion.value=0;
                opcion.text='...';
                inpSubArea.add(opcion);
                inpSubArea.setAttribute("disabled",true);
            }
        });
}
function seleccionAreaNuevaConsulta(id){
    var idArea = id.value;
    // const data = new FormData(document.getElementById('frmAgregar'));
    const options = {
        method: "GET",
        // body : data
    }; 
    // Petición HTTP
    fetch("../php/agregarAJAX.php?idArea="+idArea, options)
        .then(response => response.json())
        .then(data => {
            // console.log(data)
            var formulario = document.getElementById("frmNuevaConsulta");
            var inpSubArea = formulario.inpSubArea;
            if(data["bandera"] > 0){
  
                //limpia el select
                inpSubArea.innerHTML = "";
                //habilita el select del sub area
                inpSubArea.removeAttribute("disabled");

                var arraySelects = data['selects'];
                var numColumnas = data['numero_columnas'];

                for (indice=0;indice<numColumnas;indice++){
                    var valor = arraySelects[indice][0];
                    var texto = arraySelects[indice][1];

                    var opcion = new Option;
                    opcion.value=valor;
                    opcion.text=texto;
                    inpSubArea.add(opcion);
                }
            }
            if(data["bandera"]==0){
                // console.log("entre");
                inpSubArea.innerHTML = "";
                var opcion = new Option;
                opcion.value=0;
                opcion.text='...';
                inpSubArea.add(opcion);
                inpSubArea.setAttribute("disabled",true);
            }
        });
}
function validarCamposAgregar(){
    // swal("EXITO!","SE GUARDO EL PACIENTE CORRECTAMENTE", "success");

    var formulario = document.getElementById("frmAgregar");
    var inpFecha = formulario.inpFecha.value;
    var inpNombre = formulario.inpNombre.value;
    var inpEdad = formulario.inpEdad.value;
    var inpGenero = formulario.inpGenero.value;
    var inpUnidadNegocio = formulario.inpUnidadNegocio.value;
    var inpArea = formulario.inpArea.value;
    var inpSubArea = formulario.inpSubArea.value;
    var inpClasificacion = formulario.inpClasificacion.value;
    var inpSintoma = formulario.inpSintoma.value;
    var inpParteAfectada = formulario.inpParteAfectada.value;
    var inpObservaciones = formulario.inpObservaciones.value;
    var inpMedicamento = formulario.inpMedicamento.value;
    var inpCie = formulario.inpCie.value;
    var inpHora = formulario.inpHora.value;

    if(inpFecha=="" || inpNombre=="" || inpEdad=="" || inpCie==""){
        swal("¡ERROR!", "LLENA LOS DATOS MÍNIMOS PARA EL REGISTRO", "error");
    }else{

        const options = {
            method: "GET",
        }; 
        fetch("../php/insertar_datos.php?fecha="+inpFecha+"&nombre="+inpNombre+"&edad="+inpEdad+"&genero="+inpGenero+"&unidad="+inpUnidadNegocio+"&area="+inpArea+"&subArea="+inpSubArea+"&clasificacion="+inpClasificacion+"&sintoma="+inpSintoma+"&parte="+inpParteAfectada+"&observaciones="+inpObservaciones+"&medicamento="+inpMedicamento+"&cie="+inpCie+"&hora="+inpHora, options)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data["bandera"]==1){
                    swal("¡ÉXITO!", "SE REGISTRÓ CORRECTAMENTE EL PACIENTE", "success");
                    formulario.reset();
                    var inpSubArea = formulario.inpSubArea;
                    inpSubArea.innerHTML = "";
                    var opcion = new Option;
                    opcion.value=0;
                    opcion.text='...';
                    inpSubArea.add(opcion);
                    inpSubArea.setAttribute("disabled",true);
                }else{
                    swal("¡ERROR!", "OCURRIÓ UN ERROR EN EL REGISTRO", "error");
                }  
            })
    }
}
function validaCamposEditar(){
    var formulario = document.getElementById("frmEditarDatos");
    var id = formulario.inpId.value;
    var inpFecha = formulario.inpFechaEdit.value;
    var inpNombre = formulario.inpNombreEdit.value;
    var inpEdad = formulario.inpEdadEdit.value;
    var inpGenero = formulario.inpGeneroEdit.value;
    var inpUnidadNegocio = formulario.inpUnidadEdit.value;
    var inpArea = formulario.inpArea.value;
    var inpSubArea = formulario.inpSubArea.value;
    var inpClasificacion = formulario.inpClasificacionEdit.value;
    var inpSintoma = formulario.inpSintomaEdit.value;
    var inpParteAfectada = formulario.inpParteEdit.value;
    var inpObservaciones = formulario.inpOservacionesEdit.value;
    var inpMedicamento = formulario.inpMedicamentoEdit.value;
    var inpCie = formulario.inpCieEdit.value;

    if(inpFecha=="" || inpNombre=="" || inpEdad=="" || inpCie==""){
        swal("¡ERROR!", "LLENA LOS DATOS MÍNIMOS PARA EL REGISTRO", "error");
    }else{

        const options = {
            method: "GET",
        }; 
        fetch("../php/update_datos.php?id="+id+"&fecha="+inpFecha+"&nombre="+inpNombre+"&edad="+inpEdad+"&genero="+inpGenero+"&unidad="+inpUnidadNegocio+"&area="+inpArea+"&subArea="+inpSubArea+"&clasificacion="+inpClasificacion+"&sintoma="+inpSintoma+"&parte="+inpParteAfectada+"&observaciones="+inpObservaciones+"&medicamento="+inpMedicamento+"&cie="+inpCie, options)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data["bandera"]==1){

                    swal("¡ÉXITO!", "SE ACTUALIZÓ LA INFORMACIÓN CORRECTAMENTE", "success");

                    setTimeout(function(){
                        window.location.href = "../html/consultar.php";
                    },2500);
                }else{
                    swal("¡ERROR!", "OCURRIÓ UN ERROR AL ACTUALIZAR LA INFORMACIÓN", "error");
                }  
            })
    }
}
function buscarPaciente(){
    var formulario = document.getElementById("frmConsultar");
    var fecha = formulario.idFecha.value;
    var fechaFin = formulario.idFechaFin.value;
    console.log('fecha inicio: '+fecha);
    console.log('fecha fin: '+fechaFin);
    var nombre = formulario.idNombre.value;
    var edad = formulario.idEdad.value;
    var genero = formulario.idGenero.value;

    if(fecha=="" && nombre=="" && edad=="" && genero=="" && fechaFin==""){
        // swal("¡ERROR!", "INGRESE LOS DATOS MINIMOS PARA LA BUSQUEDA", "error");
        var tablaPacientes = document.getElementById("idTablaPacientes");
        var contenidoTablaPacientes = "";
        tablaPacientes.innerHTML = contenidoTablaPacientes;
    }else{
        const options = {
            method: "GET",
        }; 
        fetch("../php/consultar_por_filtro.php?fecha="+fecha+"&nombre="+nombre+"&edad="+edad+"&genero="+genero+"&fechaFin="+fechaFin, options)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data["bandera"]==1){
                    // swal("¡ÉXITO!", "SE ENCONTRARON PACIENTES", "success");
                    
                    var tablaPacientes = document.getElementById("idTablaPacientes");
                    var contenidoTablaPacientes = "";
                    var contenidoTablaPacientes1 = "";
                    
                    contenidoTablaPacientes = contenidoTablaPacientes + "<thead class=\"encab_negro\">";
                    contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<thead class=\"tabla\">";
                    contenidoTablaPacientes = contenidoTablaPacientes + "<tr><th class=\"encab_\">Fecha consulta</th><th class=\"encab_\">Hora Consulta</th><th class=\"encab_\">Unidad de negocio</th><th class=\"encab_\">Nombre completo</th><th class=\"encab_\">Edad</th><th class=\"encab_\">Genero</th>";
                    contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<tr style=\"color:#fffefe\"><th bgcolor=\"#000000\">Fecha de consulta</th><th bgcolor=\"#000000\">Hora consulta</th><th bgcolor=\"#000000\">Unidad de negocio</th><th bgcolor=\"#000000\">Nombre completo</th><th bgcolor=\"#000000\">Edad</th><th bgcolor=\"#000000\">Genero</th>";
                    contenidoTablaPacientes = contenidoTablaPacientes + "<th class=\"encab_\">Area</th><th class=\"encab_\">Sub area</th><th class=\"encab_\">Clasificación inicial</th><th class=\"encab_\">Sintoma inicial de visita</th><th class=\"encab_\">Observaciones</th><th class=\"encab_\">Parte del cuerpo afectada</th>";
                    contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<th bgcolor=\"#000000\">Area</th><th bgcolor=\"#000000\">Sub area</th><th bgcolor=\"#000000\">Clasificación inicial</th><th bgcolor=\"#000000\">Sintoma inicial de visita</th><th bgcolor=\"#000000\">Observaciones</th><th bgcolor=\"#000000\">Parte del cuerpo afectada</th>";
                    contenidoTablaPacientes = contenidoTablaPacientes + "<th class=\"encab_\">CIE 10</th><th class=\"encab_\">Código</th><th class=\"encab_\">Medicamento preescrito</th><th class=\"encab_\"></th><th class=\"encab_\"></th><th class=\"encab_\"></th></tr>";
                    contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<th bgcolor=\"#000000\">CIE 10</th><th bgcolor=\"#000000\">Código</th><th bgcolor=\"#000000\">Medicamento preescrito</th></tr>";
                    contenidoTablaPacientes = contenidoTablaPacientes + " </thead>";
                    contenidoTablaPacientes1 = contenidoTablaPacientes1 + " </thead>";
                    for(i=0; i<data["numero_columnas"];i++){
                        contenidoTablaPacientes = contenidoTablaPacientes + "<tr><td class=\"encab_\">"+data["pacientes"][i][1]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<tr><td bgcolor=\"#A9D08E\">"+data["pacientes"][i][1]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][2]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#C6E0B4\">"+data["pacientes"][i][2]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][3]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#A9D08E\">"+data["pacientes"][i][3]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][4]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#C6E0B4\">"+data["pacientes"][i][4]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][5]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#A9D08E\">"+data["pacientes"][i][5]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][6]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#C6E0B4\">"+data["pacientes"][i][6]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][7]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#A9D08E\">"+data["pacientes"][i][7]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][8]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#C6E0B4\">"+data["pacientes"][i][8]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][9]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#A9D08E\">"+data["pacientes"][i][9]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][10]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#C6E0B4\">"+data["pacientes"][i][10]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][11]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#A9D08E\">"+data["pacientes"][i][11]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][12]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#C6E0B4\">"+data["pacientes"][i][12]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][13]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#A9D08E\">"+data["pacientes"][i][13]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][14]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#C6E0B4\">"+data["pacientes"][i][14]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\">"+data["pacientes"][i][15]+"</td>";
                        contenidoTablaPacientes1 = contenidoTablaPacientes1 + "<td bgcolor=\"#A9D08E\">"+data["pacientes"][i][15]+"</td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\"><a id="+data["pacientes"][i][0]+" href=\"../php/nueva_consulta.php?t="+data["pacientes"][i][0]+"\" class=\"btn btn-outline-success encab_\"><img src=\"../img/nuevo.png\" height =\"15\" width=\"15\" /></a></td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\"><a id="+data["pacientes"][i][0]+" href=\"../php/editar_datos.php?t="+data["pacientes"][i][0]+"\" class=\"btn btn-outline-primary encab_\"><img src=\"../img/editar.png\" height =\"15\" width=\"15\" /></a></td>";
                        contenidoTablaPacientes = contenidoTablaPacientes + "<td class=\"encab_\"><a id="+data["pacientes"][i][0]+" onclick=\"eliminarPaciente(this)\" class=\"btn btn-outline-danger encab_\"><img src=\"../img/eliminar.png\" height =\"15\" width=\"15\" /></a></td></tr>";
                    }
                    tablaPacientes.innerHTML = contenidoTablaPacientes;
                    var tablaOculta = document.getElementById("idTablaPacientesOculta");
                    tablaOculta.innerHTML = contenidoTablaPacientes1;
                }else{
                    swal("¡ERROR!", "NO SE ENCONTRARON PACIENTES CON ESOS DATOS", "error");
                    document.getElementById("frmConsultar").reset();
                    var tablaPacientes = document.getElementById("idTablaPacientes");
                    var contenidoTablaPacientes = "";
                    tablaPacientes.innerHTML = contenidoTablaPacientes;
                }  
            })
    }
}
function pacienteNuevo(){
    var formulario = document.getElementById("frmNuevaConsulta");
    var inpFecha = formulario.inpFecha.value;
    var inpNombre = formulario.inpNombre.value;
    var inpEdad = formulario.inpEdad.value;
    var inpGenero = formulario.inpGenero.value;
    var inpUnidadNegocio = formulario.inpUnidadNegocio.value;
    var inpArea = formulario.inpArea.value;
    var inpSubArea = formulario.inpSubArea.value;
    var inpClasificacion = formulario.inpClasificacion.value;
    var inpSintoma = formulario.inpSintoma.value;
    var inpParteAfectada = formulario.inpParteAfectada.value;
    var inpObservaciones = formulario.inpObservaciones.value;
    var inpMedicamento = formulario.inpMedicamento.value;
    var inpCie = formulario.inpCie.value;
    var inpHora = formulario.inpHora.value;
    if(inpFecha=="" || inpNombre=="" || inpEdad=="" || inpCie==""){
        swal("¡ERROR!", "LLENA LOS DATOS MÍNIMOS PARA EL REGISTRO", "error");
    }else{
        const options = {
            method: "GET",
        }; 
        fetch("../php/insertar_datos.php?fecha="+inpFecha+"&nombre="+inpNombre+"&edad="+inpEdad+"&genero="+inpGenero+"&unidad="+inpUnidadNegocio+"&area="+inpArea+"&subArea="+inpSubArea+"&clasificacion="+inpClasificacion+"&sintoma="+inpSintoma+"&parte="+inpParteAfectada+"&observaciones="+inpObservaciones+"&medicamento="+inpMedicamento+"&cie="+inpCie+"&hora="+inpHora, options)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data["bandera"]==1){
                    document.getElementById("frmNuevaConsulta").reset();
                    swal("¡ÉXITO!", "SE REGISTRÓ CORRECTAMENTE EL PACIENTE", "success");
                    setTimeout(function(){
                        window.location.href = "../html/consultar.php";
                    },2500);
                }else{
                    swal("¡ERROR!", "OCURRIÓ UN ERROR EN EL REGISTRO", "error");
                }  
            })
    }
}
function eliminarPaciente(valor){
    var idPaciente = valor.id;

    swal({
        title: "¿ESTÁ SEGURO QUE DESEA ELIMINAR PACIENTE?",
        text: "¡SE BORRARÁ PERMANENTEMENTE LA INFORMACIÓN!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            
            const options = {
                method: "GET",
            }; 
        
            fetch("../php/eliminar_datos.php?id="+idPaciente, options)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data["bandera"]==1){
                        swal("¡ÉXITO!", "SE ELIMINÓ CORRECTAMENTE EL PACIENTE", "success");
                        // var tablaPacientes = document.getElementById("idTablaPacientes");
                        // document.getElementById("frmConsultar").reset();
                        // tablaPacientes.innerHTML="";
                        buscarPaciente();
                        
                    }else{
                        swal("¡ERROR!", "NO SE PUDO ELIMINAR EL PACIENTE", "error");
                    }  
                })
        } else {
          swal("NO SE ELIMINÓ EL REGÍSTRO");
        }
      });
}
function generarExcel(){
    var formulario = document.getElementById("frmConsultar");
    var fecha = formulario.idFecha.value;
    var nombre = formulario.idNombre.value;
    var edad = formulario.idEdad.value;
    var genero = formulario.idGenero.value;

    if(fecha=="" && nombre=="" && edad=="" && genero==""){
        swal("¡ERROR!", "INGRESE LOS DATOS MINIMOS PARA GENERAR EXCEL", "error");
    }else{
        const data = new FormData(document.getElementById('frmConsultar'));
        const options = {
            method: "POST",
            body : data
          };
          // Petición HTTP
          fetch("../php/generarexel.php", options)
            .then(response => response.json())
            .then(data => {
              console.log(data)
            });
        // const options = {
        //     method: "GET",
        // }; 
        // fetch("../php/generarexel.php?fecha="+fecha+"&nombre="+nombre+"&edad="+edad+"&genero="+genero, options)
        //     .then(response => response.json())
        //     .then(data => {
        //         console.log(data);
        //         if (data["bandera"]==1){
        //             swal("¡ÉXITO!", "SE GENERÓ EL EXCEL CORRECTAMENTE", "success");
        //         }else{
        //             swal("¡ERROR!", "OCURRIÓ UN ERROR AL GENERAR EXCEL", "error");
        //         }  
        //     })
    }
}