$(document).ready(function () {
    cargarEmpleados();
    cargarModulos();

});

$("#empleados").change(function () {
    var seleccionada = $(this).find("option:selected");
    var dataId = seleccionada.val();
    var nombre = seleccionada.text();
    $("#nombre").text(nombre);

    buscarInfo(dataId);
    buscarPermisos(dataId);
});


$("#guardar").click(function () {
    let id=$("#empleados").find("option:selected").val();

    if ($.trim(id)!=='Seleccione') {
         Swal.fire({
        title: "¿Esta seguro de realizar los cambios?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Guardar",
        denyButtonText: `No gracias`
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $('.permiso').each(function () {
                var submodulo = $(this).attr('submodulo');
                var estado = $(this).is(':checked');;
                var dataId = $("#empleados").find("option:selected").val();
                
                if (estado) {
                    estado = 1;
                } else {
                    estado = 0;
                }
               guardarPermisos(submodulo, estado, dataId)
               //console.log(submodulo, estado, dataId)
            });
            Swal.fire("Guardado!", "", "success");
        } else if (result.isDenied) {
            Swal.fire("No se realizo ningun cambio", "", "info");
            $(".permiso").prop('checked', false);
            $("#empleados").val('Seleccione');
            $(".etiqueta").text('');
        }
    });
    }else{
        Swal.fire("Seleccione un empleado.", "", "warning");
    }
   

});

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
                $("#empleados").html('');
                $("#empleados").html("<option>Seleccione</option>");
                $.each(respuesta, function (index, registro) {
                    var contenido = `
                                        <option value='${registro.idEmpleado}'>${capitalizar(registro.nombreCompleto)}</option>
								    `;

                    // Agregar el contenido al div 'espacioNotificaciones'
                    $('#empleados').append(contenido);
                });

            }
        },
    });
}

function buscarInfo(idEmpleado) {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/consultaPuesto.php",
        data: {
            id: idEmpleado,
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
            $("#puesto").text(datos.nombrePuesto);
            $("#proyecto").text(datos.nombre);
        },
    });
}

function capitalizar(name) {
    if (name) {
        return name.split(' ').map(function (word) {
            return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
        }).join(' ');
    }

}

function cargarModulos() {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/cargarModulos.php",
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
                $('#contenido').html = '';
                $.each(respuesta, function (index, registro) {
                    var contenido = `<div class="col-12 col-lg-4">
                                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center gx-3">
                                                    
                                                    <div class="col-auto">
                                                        <h4 class="app-card-title" id="modulo">${registro.nombre}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 pb-4 w-100 id${registro.id}">

                                               
                                            </div>

                                        </div>
                                    </div>
								    `;

                    // Agregar el contenido al div 'espacioNotificaciones'
                    $('#contenido').append(contenido);
                    cargarSubmodulo(registro.id);
                });

            }
        },
    });
}

function cargarSubmodulo(id) {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/cargarSubmodulos.php",
        data: {
            id: id,
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
                $('.id' + id).html = '';
                $.each(respuesta, function (index, registro) {
                    var contenido = `<div class="form-check form-switch mt-2">
                                        <input class="form-check-input permiso subModulo${registro.id}" type="checkbox" id="${registro.ruta}" subModulo=${registro.id}>
                                        <label class="form-check-label" for="ruta">${registro.nombre}</label>
                                    </div>
								    `;

                    // Agregar el contenido al div 'espacioNotificaciones'
                    $('.id' + id).append(contenido);
                });

            }
        },
    });
}

function guardarPermisos(submodulo, estado, idEmpleado) {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/agregarPermiso.php",
        data: {
            id: idEmpleado,
            estado: estado,
            submodulo: submodulo,
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

            console.log("exito")
        },
    });
}
function buscarPermisos(idEmpleado) {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/cargarPermisos.php",
        data: {
            id: idEmpleado,
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

                $.each(respuesta, function (index, registro) {
                    if (registro.estado == 1) {
                        $(".subModulo" + registro.submodulo).prop('checked', true);
                    } else {
                        $(".subModulo" + registro.submodulo).prop('checked', false);
                    }
                });

            } else {
                $(".permiso").prop('checked', false);
            }

        },
    });
}