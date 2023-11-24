
var accionSeleccionada = {
    id: null,
    estado: null
};

const idRegistro = $("#user-dropdown-toggle").data('id');

//* DOCUMENT.READY
$(document).ready(function () {
    VerSolicitudesAprobadasCanceladas()
});



/* Detalla la información de la acción del personal seleccionada */
$('#solicitudes').on('click', '.btn-verMas', function () {
    var idSolicitud = $(this).data('id');
    var empleado = $(this).closest('tr').find('td:eq(1)').text();
    var tipoSolicitud = $(this).closest('tr').find('td:eq(2)').text();
    var fechaSolicitud = convertirFecha($(this).closest('tr').find('td:eq(3)').text());
    var proyecto = $(this).data('proyecto');
    var jefe = capitalizar($(this).data('jefe'));
    var cargo = $(this).data('cargo');
    var comentarios = $(this).data('comentarios');
    var comentariosn1 = $(this).data('comentariosn1');
    var fechan1 = $(this).data('fechan1');
    var aprobado = capitalizar($(this).data('aprobado'));
    var comentariosn2 = $(this).data('comentariosn2');
    var fechan2 = $(this).data('fechan2');
    var desde = $(this).data('desde');
    var reanuda = $(this).data('reanuda');
    var aprobadon2 = capitalizar($(this).data('aprobadon2'));

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
                                <tr>
                                    <th>Aprobado por:</th>
                                    <td>${aprobado}</td>
                                </tr>
                                <tr>
                                    <th>Comentarios aprobación</th>
                                    <td>${comentariosn1}</td>
                                </tr>
                                <tr>
                                    <th>Fecha de aprobación</th>
                                    <td>${fechan1}</td>SE
                                </tr>
                                <tr>
                                    <th>Aprobado por:</th>
                                    <td>${aprobadon2}</td>
                                </tr>
                                <tr>
                                    <th>Comentarios aprobación</th>
                                    <td>${comentariosn2}</td>
                                </tr>
                                <tr>
                                    <th>Comentarios aprobación</th>
                                    <td>${fechan2}</td>
                                </tr>
                                </tbody>
                            </table>
								
							</div>
							
        `
    );

    // Mostrar el modal
    $('#detalleSolicitudModal').modal('show');
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
function VerSolicitudesAprobadasCanceladas() {
    $.ajax({
        type: "POST",
        url: "./sections/accionPersonal/controller/verTodas.php",
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
                        mDataProp: "estado",
                        width: '15%',
                        render: function (data, type, full, meta) {
                            let estado;
                            switch(full.estado) {
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
                                case '4':  estado = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x text-warning" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>Cancelado`; 
                                    break;
                            }
                    
                            return estado;
                        },
                    },
                    {
                        className: "text-left",
                        width: '5%',
                        render: function (data, types, full, meta) {

                            var desde=full.desde;
                            var hoy = new Date(); 
                            var cancelar="";
                            desde = desde.split('T')[0];
                            var fechaDesde = new Date(desde);
                            hoy.setHours(0, 0, 0, 0);
                        
                            if (fechaDesde > hoy) {
                                cancelar = `<li>
                                                <a class="dropdown-item bg-hover cursor-pointer btn-rechazar" 
                                                    data-id="${full.idAccionPersonal}" 
                                                    data-idEmpleado="${full.idEmpleado}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-danger" viewBox="0 0 16 16">
                                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                                    </svg>
                                                    Cancelar
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
                                                                data-aprobado="${full.aprobadoPor}" 
                                                                data-comentariosn1="${full.comentariosN1}" 
                                                                data-fechan1="${full.fechaAprobadoN1}" 
                                                                data-aprobadon2="${full.aprobadoN2}" 
                                                                data-comentariosn2="${full.comentariosN2}" 
                                                                data-fechan2="${full.fechaAprobadoN2}" 
                                                                data-desde="${full.desde}" 
                                                                data-reanuda="${full.hasta}" 
                                                                data-idEmpleado="${full.idEmpleado}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye text-primary" viewBox="0 0 16 16">
                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                                </svg>
                                                                Ver más
                                                            </a>
                                                        </li>
                                                        ${cancelar}
                                                        
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
    if (name) {
        return name.split(' ').map(function (word) {
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    }).join(' '); 
    }else{
        return '-';
    }
   
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

