$(document).ready(function () {
    new DataTable('#ListadoEmpleadoTabla');
    listarEmpleados();

    $('#ListadoEmpleadoTabla').on("click", ".btn-editar", function () {
        var idEmpleado = $(this).closest('tr').find('[data-id-empleado]').data('id-empleado');
        window.location.href = `?section=editar&${idEmpleado}`
    });
    $('#ListadoEmpleadoTabla').on("click", ".btn-ficha", function () {
        var idEmpleado = $(this).closest('tr').find('[data-id-empleado]').data('id-empleado');
        window.open(
            `./sections/empleado/reports/pdf/fichaEmpleado.php?id=${idEmpleado}`
        );
    });
    $('#ListadoEmpleadoTabla').on("click", ".btn-historial", function () {
        var idEmpleado = $(this).closest('tr').find('[data-id-empleado]').data('id-empleado');
        window.location.href = `?section=historialEmpleados&${idEmpleado}`
    });
    $('#ListadoEmpleadoTabla').on("click", ".btn-banco", function () {
        var idEmpleado = $(this).closest('tr').find('[data-id-empleado]').data('id-empleado');
        window.open(
            `./sections/empleado/reports/pdf/permisoBanco.php?id=${idEmpleado}`
        );
    });
    $('#ListadoEmpleadoTabla').on("click", ".btn-checklist", function () {
        var idEmpleado = $(this).closest('tr').find('[data-id-empleado]').data('id-empleado');
        window.open(
            `./sections/empleado/reports/pdf/checklist.php?id=${idEmpleado}`
        );
    });
    $('#imprimirTodo').on("click", function () {
        window.open(
            `./sections/empleado/reports/pdf/listadoEmpleadosActivos.php`
        );
    });
    $('#pendientes').on("click", function () {
        window.open(
            `./sections/empleado/reports/pdf/pendientes.php`
        );
    });


});



function listarEmpleados() {
    $.ajax({
        type: "GET",
        url: "./sections/empleado/controller/listarEmpleados.php",
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
                        className:"text-center",
                        mDataProp: "correlativo",
                        width: '5%',
                    },

              
                    {
                        mDataProp: "nombreCompleto",
                        width: '25%',
                        render: function (data, type, full, meta) {
                            var nombre = full.nombreCompleto;
                            var idEmpleado = full.idEmpleado; 
                            return `
                                <span data-id-empleado="${idEmpleado}">${capitalizar(nombre)}</span>
                            `;
                        },
                    },
                    {
                        mDataProp: "proyecto",
                        width: '20%',
                    },
                    {
                        mDataProp: "nombrePuesto",
                        width: '30%',
                    },
                    {
                        className: "text-center",
                        mDataProp: "telefonoAsignado",
                        width: '15%',
                    },
                    {
                        className: "text-left",
                        width: '5%',
                        render: function (data, types, full, meta) {
                            let menu = `    <center>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                                    <li>
                                                        <a class="dropdown-item bg-hover cursor-pointer btn-editar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                                            </svg>
                                                            Editar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item bg-hover cursor-pointer btn-historial">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                                            </svg>
                                                            Historial
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <a class="dropdown-item bg-hover cursor-pointer btn-ficha">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                                            </svg>
                                                            Ficha de Empleado (PDF)
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item bg-hover cursor-pointer btn-banco">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
                                                                <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
                                                            </svg>
                                                            Carta autorización bancaria (PDF)
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item bg-hover cursor-pointer btn-checklist">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                            </svg>
                                                            Checklist (PDF)
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
                cargarTabla("#ListadoEmpleadoTabla", datos, columns);


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
        order: [[0, 'asc']]
    };

    $(tableID).DataTable(params);
}


//* Funciones operativas
function capitalizar(name) {
    return name.split(' ').map(function (word) {
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    }).join(' ');
}