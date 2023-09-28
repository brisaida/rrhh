$(document).ready(function () {
    new DataTable('#ListadoEmpleadoTabla');
    listarEmpleados();

    $('#ListadoEmpleadoTabla').on("click",".btn-editar",function() {
        var idEmpleado = $(this).closest('tr').find('[data-id-empleado]').data('id-empleado');
        window.location.href=`?section=empleado&${idEmpleado}`
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
                        mDataProp: "DNI",
                        width: '15%',
                        render: function (data, type, full, meta) {
                            // Aquí puedes acceder al valor de DNI y también al valor de "id de empleado" si lo tienes en tus datos
                            var dniValue = full.DNI;
                            var idEmpleado = full.idEmpleado; // Asegúrate de que esta propiedad exista en tus datos
                
                            // Ahora puedes agregar "id de empleado" como una propiedad de datos personalizada
                            // Esto te permitirá acceder a ella posteriormente si es necesario
                            return `
                                <span data-id-empleado="${idEmpleado}">${dniValue}</span>
                            `;
                        },

                    },
                    {
                        mDataProp: "nombreCompleto",
                        width: '35%',
                    },
                    {
                        className: "text-center",
                        mDataProp: "telefono",
                        width: '25%',
                    },
                    {
                        className: "text-left",
                        width: '25%',
                        render: function (data, types, full, meta) {
                            let menu = `
                                            <center>
												<a type="button" class="btn btn-outline-primary btn-editar">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
														<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
													</svg>
												</a>
												<a href="?section=historialEmpleados" type="button" class="btn btn-outline-info" >
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
														<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
														<path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
													</svg>
												</a>
												<a href="?section=" type="button" class="btn btn-outline-warning">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
														<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
														<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
													</svg>
												</a>
                                            </center>
                  `;

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
        bSortable: false,
        ordering: false,
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
    };

    $(tableID).DataTable(params);
}