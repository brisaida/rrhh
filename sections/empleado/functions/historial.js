
// *Cuando el documento esta cargado
$(document).ready(function () {

    const location = window.location.search;
    const elementos = location.split("&");

    idRegistro = parseInt(elementos[1]);
    cargarEmpleado(elementos[1]);
    cargarZonas();
    listarProyectos();
    cargarEmpleados();
    cargarUsuarios();

    cargarHistorial(idRegistro);

});

$("#proyectos").change(function () {
    var selectedOption = $(this).find("option:selected");
    var dataId = selectedOption.val();
    listarPuestosPorProyectos(dataId);
});


$("#guardarBtn").click(function () {
    const location = window.location.search;
    const elementos = location.split("&");
    idRegistro = parseInt(elementos[1]);
    const idHistorial = $("#noIdentidad").attr("idHistorial");
    console.log(idHistorial)
    if (!idHistorial) {
        var selectedOption = $("#TDRSelect option:selected");
        var value = selectedOption.val();

        var historial = {
            idEmpleado: idRegistro,
            codigoEmpleado: $.trim($("#codigoEmpleado").val()),
            codigoSAP: $.trim($("#codigoSAP").val()),
            inicio: $.trim($("#ingreso").val()),
            vacaciones: $.trim($("#vacaciones").val()),
            telefonoAsignado: $.trim($("#telefonoAsignado").val()),
            emailAsignado: $.trim($("#emailAsignado").val()),
            usuarioAsignado: $.trim($("#usuarioAsignado").val()),
            proyectos: $.trim($("#proyectos").val()),
            idPuesto: value,
            jefeInmediato: $.trim($("#jefeInmediato").val()),
            zona: $.trim($("#zonaSelect").val()),
            sitio: $.trim($("#sitio").val()),
            inicioPuesto: $.trim($("#inicioPuesto").val()),
            salario: $.trim($("#salario").val()),
            superUsuario: $(superUsuario).prop('checked'),
        }
        agregarHistorial(historial);
    } else {
        var selectedOption = $("#TDRSelect option:selected");
        var value = selectedOption.val();

        var detalle = {
            idHistorial: $.trim($("#noIdentidad").attr("idHistorial")),
            idProyecto: $.trim($("#proyectos").val()),
            idTDR: value,
            idJefe: $.trim($("#jefeInmediato").val()),
            idDepartamento: $.trim($("#zonaSelect").val()),
            sitio: $.trim($("#sitio").val()),
            fechaInicio: $.trim($("#inicioPuesto").val()),
            salario: $.trim($("#salario").val()),
            usuario: 1,
        }
        agregarDetalle(detalle);
    }

});

$("#retirar").on("click", function () {
    $('#exampleModal').modal('hide');

    let idRegistro = $("#noIdentidad").data('id');
    let idHistorial = $("#noIdentidad").attr('idHistorial');
    Swal.fire({
        title: 'Ingrese fecha de liquidación',
        input: 'date',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        showLoaderOnConfirm: true,
        preConfirm: (fecha) => {
            if (fecha) {
                $.ajax({

                    type: "POST",
                    url: "./sections/empleado/controller/historial/retirarEmpleado.php",
                    data: {
                        idHistorial: idHistorial,
                        fecha: fecha,
                        usuario: 1,
                        idRegistro: idRegistro,
                    },
                    error: function (error) {
                        Swal.fire({
                            title: "Historial del Empleado",
                            icon: "error",
                            text: `${error.responseText}`,
                            confirmButtonColor: "#5cb377",
                        });
                    },
                    success: function (respuesta) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Guardado exitosamente',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#edicion").hide();
                        $(".accordion").hide();
                        $("#retirar").hide();
                    },
                });
            } else {
                Swal.fire({
                    title: "Historial del Empleado",
                    icon: "error",
                    text: `La fecha no fue ingresada, intenta nuevamente.`,
                    confirmButtonColor: "#5cb377",
                });
            }

        },
        allowOutsideClick: () => !Swal.isLoading()
    });
});
$("#edicion").on("click", function () {
    $("#codigoEmpleado").prop('disabled', false);
    $("#codigoSAP").prop('disabled', false);
    $("#ingreso").prop('disabled', false);
    $("#vacaciones").prop('disabled', false);
    $("#telefonoAsignado").prop('disabled', false);
    $("#usuarioAsignado").prop('disabled', false);
});

$('#superUsuario').click(function(){
    // Guarda el estado actual del checkbox en una variable
    var estadoActual = $(this).prop('checked');
    const location = window.location.search;
    const elementos = location.split("&");

    idRegistro = parseInt(elementos[1]);

    Swal.fire({
        title: '¿Estás segura?',
        text: "¿Quieres cambiar el rol del usuario?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, cambiarlo!',
        cancelButtonText: 'No, cancelar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: './sections/empleado/controller/modificar/modificarEmpleado.php', 
                type: 'POST', 
                data: {
                    // Tus datos aquí. Por ejemplo, el nuevo estado del checkbox
                    valor: estadoActual ? 1 : 0,
                    id: idRegistro,
                    campo: "superUsuario",
                    tabla: "historial",
                    usuario:1
                },
                success: function(response) {
                    Swal.fire(
                        'Cambiado!',
                        'El rol del usuario ha sido cambiado.',
                        'success'
                    );
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Error!',
                        'Hubo un problema al cambiar el rol del usuario.',
                        'error'
                    );
                }
            });
        } else {
            // El usuario canceló, revierte el estado del checkbox
            $('#superUsuario').prop('checked', !estadoActual);
        }
    });
});



// *Funciones
// *-----------------------------------------------------------------------
// *Cargar la información del empleado que vamos a agregar el historial
function cargarEmpleado(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/buscarInfoEmpleado.php",
        data: {
            id: id
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Empleados",
                icon: "error",
                text: `Error`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            let datos = respuesta[0];
            $("#noIdentidad").attr("data-id", datos.idEmpleado);
            $("#noIdentidad").val(datos.DNI);
            $("#nombreInput").val(datos.nombreCompleto);
        },
    });
}
function cargarHistorial(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/buscarInfoHistorial.php",
        data: {
            id: id
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Empleados",
                icon: "error",
                text: `Error`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            let datos = respuesta[0];
            console.log(datos)
            if (respuesta.length > 0) {
                $("#codigoEmpleado").val(datos.codigoEmpleado);
                $("#codigoSAP").val(datos.codigoSAP);
                $("#ingreso").val(datos.ingreso);
                $("#vacaciones").val(datos.vacaciones);
                $("#telefonoAsignado").val(datos.telefonoAsignado);
                $("#emailAsignado").val(datos.emailAsignado);
                $("#usuarioAsignado").val(datos.idUsuario);
                console.log(datos.superUsuario);
                if(datos.superUsuario==1){
                    $("#superUsuario").prop('checked', true).change();
                }

                $("#codigoEmpleado").prop('disabled', true);
                $("#codigoSAP").prop('disabled', true);
                $("#ingreso").prop('disabled', true);
                $("#vacaciones").prop('disabled', true);
                $("#telefonoAsignado").prop('disabled', true);
                $("#emailAsignado").prop('disabled', true);
                $("#usuarioAsignado").prop('disabled', true);
                //$("#superUsuario").prop('disabled', true);

                if (datos.estado == 0) {
                    $("#edicion").hide();
                    $(".accordion").hide();
                    $("#retirar").hide();
                    $("#alerta").prepend(`<div class="alert alert-danger text-center" role="alert">
                                                Este empleado se retiro de la empresa el ${formatearFecha(datos.Retiro)}</span>
                                            </div>`);
                }
                cargarHistorialDetalle(datos.idHistorial)
                $("#noIdentidad").attr("idHistorial", datos.idHistorial)
            } else {
                $("#edicion").hide();
            }

        },
    });
}
function cargarHistorialDetalle(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/buscarInfoHistorialDetalle.php",
        data: {
            id: id
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Empleados",
                icon: "error",
                text: `Error`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            $.each(respuesta, function (index, registro) {
                if (!registro.fechaRetiro || registro.fechaRetiro == '1900-01-01') {
                    registro.fechaRetiro = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill text-success cursor-pointer edit-fechaRetiro" data-id="${registro.idHistorialDetalle}" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                            </svg>`;
                }
                if (registro.sitio==null || registro.sitio=='') {
                    registro.sitio="-";
                }
                if (registro.salario==null || registro.salario=='') {
                    registro.salario="-";
                }
                var card = `<!-- Datos generales -->
                            <div class="row">
                            <div class="col-lg">
                                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                    <div class="app-card-header p-3 border-bottom-0">
                                        <div class="row align-items-center gx-3">
                                            <div class="col-auto">
                                                <div class="app-icon-holder">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                                                    </svg>
                                                </div><!--//icon-holder-->

                                            </div>
                                            <div class="col-auto">
                                                <h4 class="app-card-title nombrePuesto">${registro.nombrePuesto}</h4>
                                            </div>
                                        </div>
                                    </div><!--//app-card-header-->
                                    <div class="app-card-body px-4 w-100">

                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-md">
                                                    <div class="item-label"><strong>Inicio en el puesto</strong></div>
                                                    <div class="item-data fechaInicio">${formatearFecha(registro.fechaInicio)}</div>
                                                </div>
                                                <div class="col-md">
                                                <div class="item-label"><strong>Jefé Inmediato</strong></div>
                                                    <div class="item-data nombreJefe">${registro.nombreJefe}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fecha y lugar de nacimiento -->
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-md">
                                                    <div class="item-label"><strong>Zona</strong></div>
                                                    <div class="item-data text-start nombreZona"> ${capitalizar(registro.zona)}</div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="item-label"><strong>Sitio</strong></div>
                                                    <div class="item-data" id="nombreSitio">${registro.sitio}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Nacionalidad y Género -->
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                            <div class="col-md">
                                                    <div class="item-label"><strong>Retiro del puesto</strong></div>
                                                    <div class="item-data text-start fechaFinal">${registro.fechaRetiro}</div>
                                                </div>
                                              
                                                <div class="col-md">
                                                    <div class="item-label"><strong>Salario</strong></div>
                                                    <div class="item-data salario">${registro.salario}</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div><!--//app-card-->
                            </div>
                            </div>
                            `;

                $("#contenedorDetalle").append(card);

                // Agrega un evento de clic al ícono del lápiz
                $("#contenedorDetalle").on("click", ".edit-fechaRetiro", function () {
                    let idHistorial = $(this).data('id');
                    Swal.fire({
                        title: 'Ingrese fecha de retiro',
                        input: 'date',
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Guardar',
                        showLoaderOnConfirm: true,
                        preConfirm: (fecha) => {
                            $.ajax({
                                type: "POST",
                                url: "./sections/empleado/controller/historial/modficarHistorial.php",
                                data: {
                                    idHistorial: idHistorial,
                                    fecha: fecha,
                                    usuario: 1,
                                },
                                error: function (error) {
                                    Swal.fire({
                                        title: "Historial del Empleado",
                                        icon: "error",
                                        text: `${error.responseText}`,
                                        confirmButtonColor: "#3085d6",
                                    });
                                },
                                success: function (respuesta) {

                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Guardado exitosamente',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })

                                    setTimeout(function () {

                                        $('#exampleModal').modal('show');
                                    }, 1500);


                                    $("#contenedorDetalle").html(" ");
                                    var id = $("#noIdentidad").attr("idhistorial");

                                    cargarHistorialDetalle(id)
                                },
                            });
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    });
                });
            });
        },
    });
}
// *Carga todos los empleados en el select
function cargarEmpleados() {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/cargarEmpleados.php",
        data: {
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Empleados",
                icon: "error",
                text: `Error`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            if (respuesta.length > 0) {
                $("#jefeInmediato").html('');
                $("#jefeInmediato").html("<option>Seleccione</option>");
                $.each(respuesta, function (index, registro) {
                    var contenido = `
                                        <option value='${registro.idEmpleado}'>${capitalizar(registro.nombreCompleto)}</option>
								    `;

                    // Agregar el contenido al div 'espacioNotificaciones'
                    $('#jefeInmediato').append(contenido);
                });

            }
        },
    });
}
function cargarZonas() {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/cargarZonas.php",
        data: {
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Empleados",
                icon: "error",
                text: `Error`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            if (respuesta.length > 0) {
                $("#zonaSelect").html('');
                $("#zonaSelect").html("<option>Seleccione</option>");
                $.each(respuesta, function (index, registro) {
                    var contenido = `
                                        <option value='${registro.idDepartamento}'>${capitalizar(registro.descripcion)}</option>
								    `;

                    // Agregar el contenido al div 'espacioNotificaciones'
                    $('#zonaSelect').append(contenido);
                });

            }
        },
    });
}
function cargarUsuarios() {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/cargarUsuarios.php",
        data: {
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Empleados",
                icon: "error",
                text: `Error`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            if (respuesta.length > 0) {
                $("#usuarioAsignado").html('');
                $("#usuarioAsignado").html("<option val=''>Seleccione</option>");
                $.each(respuesta, function (index, registro) {
                    var contenido = `
                                        <option value='${registro.idUsuario}'>${capitalizar(registro.accesoUsuario)}</option>
								    `;

                    // Agregar el contenido al div 'espacioNotificaciones'
                    $('#usuarioAsignado').append(contenido);
                });

            }
        },
    });
}
//* Listar todos los proyectos en los select
function listarProyectos() {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/listarProyectos.php",
        data: {
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Puestos de trabajo",
                icon: "error",
                text: `Error`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            if (respuesta.length > 0) {
                $(".proyecto").html('');
                $(".proyecto").html("<option value=''>Seleccione</option>");
                $.each(respuesta, function (index, registro) {
                    var contenido = `
                                        <option value='${registro.id}'>${registro.nombre}</option>
								    `;

                    // Agregar el contenido al div 'espacioNotificaciones'
                    $('.proyecto').append(contenido);
                });

            }
        },
    });
}

function listarPuestosPorProyectos(id) {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/listarPuestosTodosPorProyecto.php",
        data: {
            id: id,
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Puestos de trabajo",
                icon: "error",
                text: `Error`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            $('#TDRSelect').html('');
            $('#TDRSelect').html('<option>Seleccione</option>');
            if (respuesta.length > 0) {

                $.each(respuesta, function (index, registro) {
                    var contenido = `
                                        <option value='${registro.idPuesto}'>${registro.nombrePuesto}</option>
								    `;

                    // Agregar el contenido al div 'espacioNotificaciones'
                    $('#TDRSelect').append(contenido);
                });

            }
        },
    });
}

//* Funciones operativas
function capitalizar(name) {
    return name.split(' ').map(function (word) {
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    }).join(' ');
}


function formatearFecha(fecha) {
    // Crear un objeto de fecha de JavaScript con la fecha dada
    var fechaObj = new Date(fecha);

    // Opciones para formatear la fecha en español
    var opciones = { year: 'numeric', month: 'long', day: 'numeric' };

    // Formatear la fecha
    var fechaFormateada = fechaObj.toLocaleDateString('es-ES', opciones);

    return fechaFormateada;
}


//*Agregar Información
function agregarHistorial(datos) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/agregarHistorial.php",
        data: {
            datos: datos,
        },
        error: function (error) {
            Swal.fire({
                title: "Historial del Empleado",
                icon: "error",
                text: `${error.responseText}`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Guardado exitosamente',
                showConfirmButton: false,
                timer: 1500
            })
            $("#modal").hide();
            cargarHistorial(datos.idEmpleado);

        },
    });
}
function agregarDetalle(datos) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/agregarDetalle.php",
        data: {
            datos: datos,
        },
        error: function (error) {
            Swal.fire({
                title: "Historial del Empleado",
                icon: "error",
                text: `${error.responseText}`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Guardado exitosamente',
                showConfirmButton: false,
                timer: 1500
            })
            $('#exampleModal').modal('hide');
            $("#contenedorDetalle").html(" ");
            cargarHistorialDetalle(datos.idHistorial)
        },
    });
}