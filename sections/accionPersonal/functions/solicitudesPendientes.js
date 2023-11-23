
var accionSeleccionada = {
    id: null,
    estado: null
};

const idRegistro = $("#user-dropdown-toggle").data('id');

//* DOCUMENT.READY
$(document).ready(function () {
    VerSolicitudesPendientes()
});



/* Detalla la información de la acción del personal seleccionada */
$('#solicitudes').on('click', '.btn-verMas', function () {
    var idSolicitud = $(this).data('id');
    var empleado = $(this).closest('tr').find('td:eq(1)').text();
    var tipoSolicitud = $(this).closest('tr').find('td:eq(2)').text();
    var fechaSolicitud = convertirFecha($(this).closest('tr').find('td:eq(3)').text());
    var desde = convertirFecha($(this).closest('tr').find('td:eq(4)').text());
    var reanuda = convertirFecha($(this).closest('tr').find('td:eq(5)').text());
    var proyecto = $(this).data('proyecto');
    var jefe = capitalizar($(this).data('jefe'));
    var cargo = $(this).data('cargo');
    var comentarios = $(this).data('comentarios');

    // Llenar el modal con la información
    var modalBody = $('#detalleSolicitudModal').find('.modal-body');
    $('#noSolicitud').text("SOLICITUD NO. " + idSolicitud);
    modalBody.html(
        `
                             <div class="row">
								
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
                                    <th>Comentarios</th>
                                    <td>${comentarios}</td>
                                </tr>
                                </tbody>
                            </table>
								
							</div>
							
        `
    );

    // Mostrar el modal
    $('#detalleSolicitudModal').modal('show');
});

/* Permite aprobar la solicitud a un NIVEL 1 */
$('#solicitudes').on('click', '.btn-aprobar', function () {
    accionSeleccionada.id = $(this).data('id');
    idEmpleado = $(this).data('idempleado');
    accionSeleccionada.estado = 2; // Estado para "aprobado"
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¿Quieres aprobar esta acción de personal?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, aprobar',
        cancelButtonText: 'No',
        input: 'textarea',
        inputPlaceholder: 'Escribe tus comentarios aquí...',
        inputAttributes: {
            'aria-label': 'Escribe tus comentarios aquí'
        }
    }).then((result) => {
        console.log('Accion ID:', accionSeleccionada.id, 'Estado:', accionSeleccionada.estado, 'Comentarios:', result.value);

        if (result.isConfirmed) {

            console.log(idEmpleado)
            console.log(idRegistro)
            if (idEmpleado == idRegistro) {
                Swal.fire({
                    title:"¡Ups!",
                    text: "No puedes aprobar tu propia solicitud",
                    icon: "error"
                  });

            } else {
                $.ajax({
                    type: "POST",
                    url: "./sections/accionPersonal/controller/cambiarEstado.php",
                    data: {
                        id: accionSeleccionada.id,
                        estado: accionSeleccionada.estado,
                        comentarios: result.value
                    },
                    success: function (response) {
                        var rowToRemove = $('#solicitudes').find('tr[data-id="' + accionSeleccionada.id + '"]');

                        console.log('Row to Remove:', rowToRemove);

                        rowToRemove.remove();

                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Aprobado correctamente.",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 1500);

                    },
                    error: function (error) {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Parece que algo esta mal.",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            } 
        }
    });
});

/* Permite cancelar la solicitud a un NIVEL 1 */
$('#solicitudes').on('click', '.btn-rechazar', function () {
    accionSeleccionada.id = $(this).data('id');
    idEmpleado = $(this).data('idempleado');
    accionSeleccionada.estado = 4; // Estado para "cancelado"
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¿Quieres cancelar esta acción de personal?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, cancelar',
        cancelButtonText: 'No',
        input: 'textarea',
        inputPlaceholder: 'Escribe tus comentarios aquí...',
        inputAttributes: {
            'aria-label': 'Escribe tus comentarios aquí'
        }
    }).then((result) => {
        console.log('Accion ID:', accionSeleccionada.id, 'Estado:', accionSeleccionada.estado, 'Comentarios:', result.value);

        if (result.isConfirmed) {

            console.log(idEmpleado)
            console.log(idRegistro)
            if (idEmpleado == idRegistro) {
                Swal.fire({
                    title:"¡Ups!",
                    text: "No puedes cancelar tu propia solicitud",
                    icon: "error"
                  });

            } else if(result.value!==''){
                $.ajax({
                    type: "POST",
                    url: "./sections/accionPersonal/controller/cambiarEstado.php",
                    data: {
                        id: accionSeleccionada.id,
                        estado: accionSeleccionada.estado,
                        comentarios: result.value
                    },
                    success: function (response) {
                        var rowToRemove = $('#solicitudes').find('tr[data-id="' + accionSeleccionada.id + '"]');

                        console.log('Row to Remove:', rowToRemove);

                        rowToRemove.remove();

                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Cancelado correctamente.",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 1500);

                    },
                    error: function (error) {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Parece que algo esta mal.",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            } else {
                Swal.fire({
                    title:"¡Ups!",
                    text: "Los comentarios para cancelar una solicitud son importantes. Intenta de nuevo",
                    icon: "error"
                  });
            }
        }
    });
});



/* Carga la tabla con todas las acciones de personal pendientes */
function VerSolicitudesPendientes() {
    $.ajax({
        type: "POST",
        url: "./sections/accionPersonal/controller/solicitudesPendientes.php",
        data: {
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

            if (datos.length > 0) {
                var columns = [

                    {
                        className: "text-center",
                        mDataProp: "idAccionPersonal",
                        width: '5%',
                    },
                    {
                        mDataProp: "nombreCompleto",
                        width: '20%',
                        render: function (data, type, full, meta) {
                            var nombre = full.nombreCompleto;
                            var idEmpleado = full.idEmpleado;
                            return `
                                <span >${capitalizar(nombre)}</span>
                            `;
                        },

                    },
                    {
                        mDataProp: "accion",
                        width: '20%',

                    },
                    {
                        className: "text-center",
                        mDataProp: "fechaCreado",

                        width: '15%',
                        render: function (data, type, full, meta) {
                            const meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
                            const fecha = new Date(full.desde);
                            const dia = fecha.getDate();
                            const mes = meses[fecha.getMonth()];
                            const año = fecha.getFullYear();
                            return `${dia}-${mes}-${año}`;
                        },
                    },
                    {
                        className: "text-center",
                        mDataProp: "desde",

                        width: '15%',
                        render: function (data, type, full, meta) {
                            const meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
                            const fecha = new Date(full.desde);
                            const dia = fecha.getDate();
                            const mes = meses[fecha.getMonth()];
                            const año = fecha.getFullYear();
                            return `${dia}-${mes}-${año}`;
                        },
                    },
                    {
                        className: "text-center",
                        mDataProp: "hasta",

                        width: '15%',
                        render: function (data, type, full, meta) {
                            const meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
                            const fecha2 = new Date(full.hasta);
                            const dia2 = fecha2.getDate();
                            const mes2 = meses[fecha2.getMonth()];
                            const año2 = fecha2.getFullYear();
                            return `${dia2}-${mes2}-${año2}`;
                        },
                    },
                    {
                        className: "text-left",
                        width: '5%',
                        render: function (data, types, full, meta) {

                            var desde=full.desde;
                            var hoy = new Date(); 
                            var aprobar="";
                            desde = desde.split('T')[0];
                            var fechaDesde = new Date(desde);
                            hoy.setHours(0, 0, 0, 0);
                        
                            if (fechaDesde > hoy) {
                                aprobar = `<li>
                                            <a class="dropdown-item bg-hover cursor-pointer btn-aprobar" 
                                                data-id="${full.idAccionPersonal}" 
                                                data-idEmpleado="${full.idEmpleado}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2 text-primary" viewBox="0 0 16 16">
                                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                                </svg>
                                                Aprobar
                                            </a>
                                           </li>`;
                            }
                           


                            let menu = `    <center>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                                        </svg>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                
                                                        
                                                        <li>
                                                            <a class="dropdown-item bg-hover cursor-pointer btn-verMas" 
                                                                data-id="${full.idAccionPersonal}" 
                                                                data-comentarios="${full.comentarios}" 
                                                                data-proyecto="${full.proyecto}" 
                                                                data-jefe="${full.jefe}" 
                                                                data-cargo="${full.nombrePuesto}" 
                                                                data-idEmpleado="${full.idEmpleado}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye text-primary" viewBox="0 0 16 16">
                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                                </svg>
                                                                Ver más
                                                            </a>
                                                        </li>
                                                        ${aprobar}
                                                        <li>
                                                            <a class="dropdown-item bg-hover cursor-pointer btn-rechazar" 
                                                                data-id="${full.idAccionPersonal}" 
                                                                data-idEmpleado="${full.idEmpleado}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-danger" viewBox="0 0 16 16">
                                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                                                </svg>
                                                                Cancelar
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </center>`;

                            return `${menu}`;

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





//*FUNCIONES OPERATIVAS
function capitalizar(name) {
    return name.split(' ').map(function (word) {
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    }).join(' ');
}

function convertirFecha(fechaOriginal) {
    // Mapeo de abreviaturas de mes a nombres completos
    var meses = {
        'Jan': 'Enero', 'Feb': 'Febrero', 'Mar': 'Marzo', 'Apr': 'Abril',
        'May': 'Mayo', 'Jun': 'Junio', 'Jul': 'Julio', 'Aug': 'Agosto',
        'Sep': 'Septiembre', 'Oct': 'Octubre', 'Nov': 'Noviembre', 'Dec': 'Diciembre'
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

