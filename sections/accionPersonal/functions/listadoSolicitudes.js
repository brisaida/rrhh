$(document).ready(function () {
    $('#solicitudes').DataTable({
        "pageLength": 25,
    });
    const idRegistro = $("#user-dropdown-toggle").data('id');

    listarMisSolicitud(idRegistro)
    cargarInfo(idRegistro);


});
/* Detalla la información de la acción del personal seleccionada */
$('#solicitudes').on('click', '.btn-verMas', function () {
    var idSolicitud = $(this).data('id');
    var empleado = capitalizar($(this).data('nombre'));
    var tipoSolicitud = $(this).closest('tr').find('td:eq(1)').text();
    var fechaSolicitud = convertirFecha($(this).closest('tr').find('td:eq(2)').text());
    var desde = convertirFecha($(this).closest('tr').find('td:eq(3)').text());
    var reanuda = convertirFecha($(this).closest('tr').find('td:eq(4)').text());
    var proyecto = $(this).data('proyecto');
    var jefe = capitalizar($(this).data('jefe'));
    var cargo = $(this).data('cargo');
    var comentarios = $(this).data('comentarios');
    var comentariosN1 = $(this).data('comentariosn1');
    var comentariosN2 = $(this).data('comentariosn2');
    var comentariosC = $(this).data('comentariosc');
    var nombreN1 = $(this).data('nombren1');
    var nombreN2 = $(this).data('nombren2');
    var nombrecancelado = capitalizar($(this).data('nombrecancelado'));
    var fechaN1 = $(this).data('fechan1');
    var fechaN2 = $(this).data('fechan2');
    var fechaCancelado =  formatearFecha($(this).data('fechacancelado'));
    var estado = $(this).data('estado');
    var dias = $(this).data('dias');

    // Llenar el modal con la información
    var modalBody = $('#detalleSolicitudModal').find('.modal-body');
    $('#noSolicitud').text("SOLICITUD NO. " + idSolicitud);
    var n1 = "";
    var n2 = "";    
    var cancelado = "";
    if (estado !== 4) {
        
        if (nombreN1) {
            n1 = `<tr>
                <th>Aprobación Jefe Inmediato</th>
                <td>${nombreN1}</td>
            </tr>
            <tr>
                <th>Fecha de aprobación</th>
                <td>${fechaN1}</td>
            </tr>
            <tr>
                <th>Comentarios de Aprobación</th>
                <td>${comentariosN1}</td>
            </tr>`;
        };
        if (nombreN2) {
            n2 = ` <tr>
                    <th>Aprobación RRHH</th>
                    <td>${nombreN2}</td>
                </tr>
                <tr>
                    <th>Fecha de aprobación</th>
                    <td>${fechaN2}</td>
                </tr>
                <tr>
                    <th>Comentarios de Aprobación</th>
                    <td>${comentariosN2}</td>
                </tr>`;
        }

    }else if (estado==4) {
        if (nombrecancelado) {
            cancelado = ` <tr>
                    <th>Cancelado por</th>
                    <td>${nombrecancelado}</td>
                </tr>
                <tr>
                    <th>Fecha de cancelación</th>
                    <td>${fechaCancelado}</td>
                </tr>
                <tr>
                    <th>Motivo de cancelación</th>
                    <td>${comentariosC}</td>
                </tr>`;
        }
    } 


    var contenido = `<div class="row">			
                        <div class="row">
                            <table class="table table-sm table-striped-columns">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">Empleado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="text-center">${empleado}</td>
                                    </tr>
                                    <tr>
                                        <th>Cargo</th>
                                        <td>${cargo}</td>
                                    </tr>
                                    <tr>
                                        <th>Proyecto</th>
                                        <td>${proyecto}</td>
                                    </tr>
                                    <tr>
                                        <th>Jefe Inmediato</th>
                                        <td>${jefe}</td>
                                    </tr>
                                    <tr>
                                        <th>Tipo de Acción</th>
                                        <td>${tipoSolicitud}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha de Solicitud</th>
                                        <td>${fechaSolicitud}</td>
                                    </tr>
                                    <tr>
                                        <th>Rige desde</th>
                                        <td>${desde}</td>
                                    </tr>
                                    <tr>
                                        <th>Reanuda</th>
                                        <td>${reanuda}</td>
                                    </tr>
                                    <tr>
                                        <th>Dias ausente</th>
                                        <td>${dias}</td>
                                    </tr>
                                    <tr>
                                        <th>Comentarios</th>
                                        <td>${comentarios}</td>
                                    </tr>
                                    ${n1}${n2}${cancelado}
                                </tbody>
                            </table>						
                        </div>`;

    modalBody.html(contenido);

    // Mostrar el modal
    $('#detalleSolicitudModal').modal('show');
});
function listarMisSolicitud(id) {
    $.ajax({
        type: "POST",
        url: "./sections/accionPersonal/controller/cargarMisSolicitudes.php",
        data: {
            id: id
        },
        error: function (error) {
            Swal.fire({
                title: "Empleado",
                icon: "error",
                text: `${error.responseText}`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            const datos = JSON.parse(respuesta);
            console.log(datos)
            if (datos.length > 0) {
                var columns = [

                    {
                        className: "text-center",
                        mDataProp: "idAccionPersonal",
                        width: '5%',
                    },
                    {
                        mDataProp: "accion",
                        width: '15%',
                    },
                    {
                        className: "text-center",
                        mDataProp: "fechaSolicitud",
                        width: '10%',
                        render: function (data, type, full, meta) {
                            const meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
                            const fecha = new Date(data);
                            const dia = fecha.getDate();
                            const mes = meses[fecha.getMonth()];
                            const año = fecha.getFullYear();
                            return `${dia}-${mes}-${año}`;
                        },
                    },
                    {
                        className: "text-center",
                        mDataProp: "desde",
                        width: '10%',
                        render: function (data, type, full, meta) {
                            const meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
                            const fecha = new Date(data);
                            const dia = fecha.getDate();
                            const mes = meses[fecha.getMonth()];
                            const año = fecha.getFullYear();
                            return `${dia}-${mes}-${año}`;
                        },
                    },
                    {
                        className: "text-center",
                        mDataProp: "hasta",
                        width: '10%',
                        render: function (data, type, full, meta) {
                            const meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
                            const fecha = new Date(data);
                            const dia = fecha.getDate();
                            const mes = meses[fecha.getMonth()];
                            const año = fecha.getFullYear();
                            return `${dia}-${mes}-${año}`;
                        },
                    },
                    {
                        mDataProp: "comentarios",
                        width: '15%',
                    },
                    {
                        className: "text-center",
                        mDataProp: "estado",
                        width: '10%',
                        render: function (data, type, full, meta) {
                            let estado;
                            switch (full.estado) {
                                case '1': estado = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch text-warning" viewBox="0 0 16 16">
                                                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                                                        <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                                                    </svg> Pendiente`;
                                    break;
                                case '2': estado = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check text-info" viewBox="0 0 16 16">
                                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                    </svg>Aprobado por Jefé inmediato`;
                                    break;
                                case '3': estado = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all text-success" viewBox="0 0 16 16">
                                                        <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                                    </svg>Aprobado por Recursos Humanos`;
                                    break;
                                case '4': estado = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x text-warning" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>Cancelado`;
                                    break;
                            }

                            return estado;
                        },
                    },
                    {
                        className: "text-center",
                        mDataProp: "estado",
                        width: '5%',
                        render: function (data, type, full, meta) {
                            menu = `<a  class="btn btn-outline-primary btn-verMas"  
                                        data-bs-toggle="tooltip" 
                                        data-bs-placement="top" 
                                        title="Ver Más" 
                                        data-id="${full.idAccionPersonal}" 
                                        data-dias="${full.cantidadDias}" 
                                        data-nombre="${full.nombreCompleto}" 
                                        data-comentarios="${full.comentarios}" 
                                        data-proyecto="${full.proyecto}" 
                                        data-jefe="${full.jefe}" 
                                        data-estado="${full.estado}" 
                                        data-cargo="${full.nombrePuesto}" 
                                        data-nombren1="${full.nombreN1}" 
                                        data-nombren2="${full.nombreN2}" 
                                        data-nombrecancelado="${full.nombrecancelado}" 
                                        data-fechan1="${full.fechaAprobadoN1}" 
                                        data-fechan2="${full.fechaAprobadoN2}" 
                                        data-fechacancelado="${full.fechaCancelado}" 
                                        data-comentariosn1="${full.comentariosN1}" 
                                        data-comentariosn2="${full.comentariosN2}" 
                                        data-comentariosc="${full.comentariosCancelado}" 
                                        data-idEmpleado="${full.idEmpleado}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </a>
`;

                            return menu;
                        },
                    },

                ];

                // Llamado a la función para crear la tabla con los datos
                cargarTabla("#solicitudes", datos, columns);


            } else {
                // swal.fire("Empleados","El productor no se encuentra registrado en sistema","info");

            }


        },
    });

}
function cargarTabla(tableID, data, columns) {
    $(tableID).dataTable().fnClearTable();
    $(tableID).dataTable().fnDestroy();
    var params = {
        aaData: data,
        
        aoColumns: columns,
        ordering: true,
        pageLength: 25,
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
                "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
            oAria: {
                sSortAscending:
                    ": Activar para ordenar la columna de manera ascendente",
                sSortDescending:
                    ": Activar para ordenar la columna de manera descendente",
            },

        },
        columnDefs: [
            {
                /*  targets: 0,  // Índice de la columna Fecha de Nacimiento
                 visible: false */
            }
        ],
        order: [[0, 'desc']]
    };

    $(tableID).DataTable(params);
}

function cargarInfo(id) {
    $.ajax({
        type: "POST",
        url: "./sections/accionPersonal/controller/cargarVacaciones.php",
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
            if (respuesta.length > 0) {
                let datos = respuesta[0];






                $("#ingreso").text(formatearFecha(datos.ingreso));
                $("#aniosTrabajados").text(datos.TiempoServicioAnios);
                $("#vacacionesDisponibles").text(datos.vacacionesDisponibles);
                $("#vacacionesAcumuladas").text(datos.vacacionesAcumuladas);
                if (datos.vacacionesDisponibles < 0) {
                    $("#vacacionesDisponibles").addClass("text-danger");
                }

                consultarVacacionesAcumuladas(datos.TiempoServicioAnios)

            } else {
                console.log("No se cargaron los datos del empleado")
            }


        },
    });
}

function consultarVacacionesAcumuladas(anios) {
    $.ajax({
        type: "POST",
        url: "./sections/accionPersonal/controller/vacacionesAcumuladas.php",
        data: {
            anios: anios
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

            var anterior = $("#vacacionesAcumuladas").text();
            var disponible = $("#vacacionesDisponibles").text();
            var actual = respuesta[0].acumulado
            var ganado = respuesta[0].vacaciones
            const idRegistro = $("#user-dropdown-toggle").data('id');
            if (anterior < actual) {
                $("#vacacionesAcumuladas").text(actual);
                var nuevoDisponible = parseInt(ganado) + parseInt(disponible);
                $("#vacacionesDisponibles").text(nuevoDisponible);
                if (nuevoDisponible > 0) {
                    $("#vacacionesDisponibles").addClass("text-success");
                    $("#vacacionesDisponibles").removeClass("text-danger");
                } else {
                    $("#vacacionesDisponibles").addClass("text-danger");
                    $("#vacacionesDisponibles").removeClass("text-success");
                }

                datos = {
                    idEmpleado: idRegistro,
                    vacacionesDisponibles: nuevoDisponible,
                    vacacionesAcumuladas: actual,
                }
                guardarNuevaInfo(datos);

            } else {
                console.log("igual")
            }


        },
    });
}

function formatearFecha(fecha) {
    var partesFecha = fecha.split('-');
    if (partesFecha.length === 3) {
        return partesFecha[2] + '-' + partesFecha[1] + '-' + partesFecha[0];
    } else {
        return fecha; // Retorna la fecha original si no está en el formato esperado
    }
}

function guardarNuevaInfo(datos) {
    $.ajax({
        type: "POST",
        url: "./sections/accionPersonal/controller/agregarVacaciones.php",
        data: {
            datos: datos,
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);

        },
        success: function (respuesta) {
            console.log("Éxito!")
        },
    });
}

//*FUNCIONES OPERATIVAS
function capitalizar(name) {
    if (name) {
        return name.split(' ').map(function (word) {
            return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
        }).join(' ');
    }

}

function convertirFecha(fechaOriginal) {
    // Mapeo de abreviaturas de mes a nombres completos
    if (fechaOriginal) {
        var meses = {
            'Ene': 'Enero', 'Feb': 'Febrero', 'Mar': 'Marzo', 'Abr': 'Abril',
            'May': 'Mayo', 'Jun': 'Junio', 'Jul': 'Julio', 'Ago': 'Agosto',
            'Sep': 'Septiembre', 'Oct': 'Octubre', 'Nov': 'Noviembre', 'Dic': 'Diciembre'
        };

        // Divide la fecha original en componentes
        var partes = fechaOriginal.split('-');
        var dia = partes[0];
        var mesAbreviado = partes[1];
        var año = partes[2];

        // Convierte el mes a nombre completo
        var mesCompleto = meses[mesAbreviado];

        // Reformatea la fecha
        var fechaConvertida = dia + ' de ' + mesCompleto + ' del ' + año;
        return fechaConvertida;
    }

}

function formatearFecha(fecha) {
    var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var fechaObj = new Date(fecha);
    var dia = fechaObj.getDate();
    var mes = fechaObj.getMonth();
    var año = fechaObj.getFullYear();

    return dia + " de " + meses[mes] + " del " + año;
}


