//*Document.ready
$(document).ready(function () {
    var hoy = new Date();
    var fecha = hoy.toISOString().substring(0, 10); // Formato aaaa-mm-dd
    $('#fechaSolicitud').text(formatearFecha(fecha));
    $('#fechaSolicitud').attr('fecha', fecha);

    const idRegistro = $("#user-dropdown-toggle").data('id');

    cargarEncabezado(idRegistro)
    cargarTipoAccion()

    $('#desde, #reanuda').on('keydown paste', function(event){
        event.preventDefault(); // Esto evitará la entrada de teclado o pegado
    });


    // Evento cuando cambia el valor de "desde" o "reanuda"
    $('#desde, #reanuda').change(function () {
        var desde = $('#desde').val();
        var dias = parseInt($('#tipoAccion').find('option:selected').data('dias'));
        var reanuda = $('#reanuda').val();
    
        if (dias && !isNaN(dias)) {
            var fechaDesde = new Date(desde);
            var diasSumados = 0;
    
            while (diasSumados < dias) {
                fechaDesde.setDate(fechaDesde.getDate() + 1);
    
                if (fechaDesde.getDay() !== 0 && fechaDesde.getDay() !== 6) {
                    diasSumados++;
                }
            }
    
            var nuevaFecha = fechaDesde.toISOString().split('T')[0]; // Obteniendo solo la parte de la fecha
            $('#reanuda').val(nuevaFecha);
            console.log("Nueva fecha: " + nuevaFecha);
        } else if (desde && reanuda) {
            var diasHabiles = calcularDiasHabiles(desde, reanuda);
            $("#diasTomar").val(diasHabiles);
        }
    });
    


    /* Agregar la información de los dias de permiso dependiendo del tipo de acción */
    $("#tipoAccion").change(function () {
        var valorSeleccionado = $(this).val();
        var dias = $(this).find('option:selected').data('dias');
        if (dias !== null) {
            $("#diasTomar").attr("disabled", "disabled")
            $("#reanuda").attr("disabled", "disabled")
            $("#diasTomar").val(dias)
        } else {
            $("#diasTomar").removeAttr("disabled")
            $("#reanuda").removeAttr("disabled")
            $("#diasTomar").val("")
        }

    });
});


//*Funciones FRONT
$("#guardarBtn").click(function () {
    const idRegistro = $("#user-dropdown-toggle").data('id');
    var accion = {
        idEmpleado: idRegistro,
        solicitud: $("#fechaSolicitud").attr("fecha"),
        tipo: $("#tipoAccion").val(),
        permiso: $("#tipoAccion").find(":selected").text(),
        dias: $("#diasTomar").val(),
        desde: $("#desde").val(),
        hasta: $("#reanuda").val(),
        comentarios: $("#comentarios").val(),
        nombreCompleto: $("#nombreCompleto").text(),
        nombreJefe: $("#jefe").text(),
        correo: $("#nombreCompleto").attr('email'),
        correoJefe: $("#jefe").attr('emailjefe'),
    }

    if (accion.hasta < accion.desde) {
        Swal.fire({
            title: "Acción de personal",
            icon: "error",
            text: `¡Ups! Algo anda mal con las fechas `,
            confirmButtonColor: "#3085d6",
        });
    } else if (accion.tipo == '' ||
        accion.desde == '' ||
        accion.hasta == '' ||
        accion.comentarios == '') {
        Swal.fire({
            title: "Acción de personal",
            icon: "error",
            text: `!Ups! Parece que falta información.`,
            confirmButtonColor: "#3085d6",
        });
    } else {
        guardarAccion(accion)

    }
});


//*Funciones de la base de datos
function cargarEncabezado(id) {
    $.ajax({
        type: "POST",
        url: "./sections/accionPersonal/controller/cargarInfo.php",
        data: {
            id: id
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Acción de personal",
                icon: "error",
                text: `!Ups! Parece que algo NO anda bien.`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            let datos = respuesta[0];
            if (respuesta.length > 0) {
                $("#codigo").text(datos.codigoEmpleado);
                $("#nombreCompleto").text(capitalizar(datos.nombreCompleto));
                $("#nombreCompleto").attr('email', datos.correo);
                $("#ingreso").text(formatearFecha(datos.ingreso));
                $("#cargo").text(datos.nombrePuesto);
                $("#zona").text(capitalizar(datos.Descripcion));
                $("#proyecto").text(datos.proyecto);
                $("#jefe").text(capitalizar(datos.jefe));
                $("#jefe").attr('emailJefe', (datos.emailJefe));



            }

        },
    });
}
function cargarTipoAccion() {
    $.ajax({
        type: "POST",
        url: "./sections/accionPersonal/controller/tipoAccion.php",
        data: {
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Acción de personal",
                icon: "error",
                text: `!Ups! Parece que algo NO anda bien.`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            if (respuesta.length > 0) {
                $("#tipoAccion").html('');
                $("#tipoAccion").html("<option>Seleccione</option>");
                $.each(respuesta, function (index, registro) {
                    var contenido = `
                                        <option value='${registro.idAccion}' data-dias='${registro.diasPermiso}'>${capitalizar(registro.accion)}</option>
								    `;

                    // Agregar el contenido al div 'espacioNotificaciones'
                    $('#tipoAccion').append(contenido);
                });

            }
        },
    });
}
function guardarAccion(datos) {
    $.ajax({
        type: "POST",
        url: "./sections/accionPersonal/controller/agregarAccion.php",
        data: {
            datos: datos,
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Acción de personal",
                icon: "error",
                text: `!Ups! Parece que algo NO anda bien.` + error,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Guardado exitosamente",
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(function () {
                window.location.href = '?section=estadoSolicitud';
            }, 1500);
        },
    });
}



//*Funciones operativas
function formatearFecha(fecha) {
    // Crear un objeto de fecha de JavaScript con la fecha dada
    var fechaObj = new Date(fecha);

    // Opciones para formatear la fecha en español
    var opciones = { year: 'numeric', month: 'long', day: 'numeric' };

    // Formatear la fecha
    var fechaFormateada = fechaObj.toLocaleDateString('es-ES', opciones);

    return fechaFormateada;
}

function capitalizar(name) {
    return name.split(' ').map(function (word) {
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    }).join(' ');
}

function calcularDiasHabiles(desde, reanuda) {
    var start = moment(desde);
    var end = moment(reanuda);
    var weekdays = [1, 2, 3, 4, 5]; // Lunes a Viernes

    var days = 0;
    while (start.isBefore(end)) {
        if (weekdays.indexOf(start.day()) !== -1) {
            days++;
        }
        start.add(1, 'days');
    }

    return days;
}

