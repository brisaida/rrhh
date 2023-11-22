var accionSeleccionada = {
    id: null,
    estado: null
};

$(document).ready(function () {
    $('#solicitudes').DataTable({
        "pageLength": 25,
    });
    const idRegistro = $("#user-dropdown-toggle").data('id');
    //*MOSTRAR SOLICITUDES PENDIENTES
    VerSolicitudes(idRegistro)
   
});

//*ACCIONES DE LA TABLA

$('#solicitudes').on("click", ".btn-imprimir", function () {
    var idAccion = $(this).data('id');
    var idEmpleado = $(this).data('idempleado');
    window.open(
        `./sections/accionPersonal/reports/accionPersonal.php?id=${idAccion}&idE=${idEmpleado}`
    );
});


//*LLENAR TABLAS
function VerSolicitudes(id) {
    $.ajax({
        type: "POST",
        url: "./sections/accionPersonal/controller/visorSolicitudes.php",
        data: {
            id: id,
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
                        className: "text-center",
                        mDataProp: "cantidadDias",
                        width: '10%',
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
                                                    </svg><span class="text-info">Aprobado por Jefe Inmediato<span>`;
                                    break;
                                case '3': estado = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all text-success" viewBox="0 0 16 16">
                                                        <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                                    </svg><span class="text-success">Aprobado por RRHH<span>`;
                                    break;
                                case '4': estado = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg><span class="text-danger">Cancelado<span>`;
                                    break;
                            }

                            return estado;
                        },
                    },
                    {
                        className: "text-left",
                        width: '5%',
                        render: function (data, types, full, meta) {
                            var fechaActual = new Date();

                            // Formatea la fecha manualmente (puedes ajustar el formato según tus necesidades)
                            var dia = fechaActual.getDate();
                            var mes = fechaActual.getMonth() + 1; // Los meses van de 0 a 11
                            var año = fechaActual.getFullYear();
                        
                            // Añade un cero inicial si el día o el mes es menor a 10
                            dia = dia < 10 ? '0' + dia : dia;
                            mes = mes < 10 ? '0' + mes : mes;
                        
                            // Construye la cadena de fecha en el formato deseado
                            var fechaFormateada =  año+ '-' + mes + '-' + dia;
                            let menu = `    <center>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                 `
                            if (full.estado != 4 && full.desde > fechaFormateada) {
                                menu += ` <li>
                                        <a class="dropdown-item bg-hover cursor-pointer rechazar"  data-id="${full.idAccionPersonal}" data-idEmpleado="${full.idEmpleado}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-danger" viewBox="0 0 16 16">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                            </svg>
                                            Cancelar
                                        </a>
                                    </li>`
                            }


                            menu += `
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item bg-hover cursor-pointer btn-imprimir" data-id="${full.idAccionPersonal}" data-idEmpleado="${full.idEmpleado}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                                        </svg>
                                                        Imprimir (PDF)
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

function cambiarEstado(id, valor) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/cambiarEstado.php",
        data: {
            id: id,
            valor: valor,
        },
        dataType: "json",
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Acción de Personal.",
                icon: "error",
                text: `Ups! Parece que algo anda mal.`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            Swal.fire({
                title: "Acción de Personal.",
                icon: "success",
                text: `Aprobado correctamente`,
                confirmButtonColor: "#3085d6",
            });
        },
    });
}

function capitalizar(name) {
    return name.split(' ').map(function (word) {
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    }).join(' ');
}

function actualizarFecha() {
    // Obtiene la fecha actual
    var fechaActual = new Date();

    // Formatea la fecha manualmente (puedes ajustar el formato según tus necesidades)
    var dia = fechaActual.getDate();
    var mes = fechaActual.getMonth() + 1; // Los meses van de 0 a 11
    var año = fechaActual.getFullYear();

    // Añade un cero inicial si el día o el mes es menor a 10
    dia = dia < 10 ? '0' + dia : dia;
    mes = mes < 10 ? '0' + mes : mes;

    // Construye la cadena de fecha en el formato deseado
    var fechaFormateada = dia + '/' + mes + '/' + año;

    // Actualiza el elemento HTML con la fecha formateada
    $('#fechaActual').text(fechaFormateada);
  }
