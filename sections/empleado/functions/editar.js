$(document).ready(function () {
    usuario = 1;
    const location = window.location.search;
    const elementos = location.split("&");
    if (elementos.length > 1) {
        const idRegistro = parseInt(elementos[1]);

        editar = true;

        $('.no-editable').attr('disabled');
        $('#revisarBtn').hide();
        $('.adjuntos').show();
        $('.no-mostrar').hide();
        $('#nuevaDireccion').hide();
        $('#lat').hide();
        $('#long').hide();
        cargarEmpleado(idRegistro);
        cargarHistoriaFamiliar(idRegistro)
        cargaInfoSalud(idRegistro)
        cargarEducacion(idRegistro)
        cargarIdiomas(idRegistro)
        cargarEstudiosActuales(idRegistro)

    }


    //* Llamados a la modificación de datos (Botones de modificar)
    $("#adjuntosPage").click(function(){
        const location = window.location.search;
        const elementos = location.split("&");
        const idRegistro = parseInt(elementos[1]);
        window.location.href = `?section=editarAdjuntos&${idRegistro}`
    });
    $('#educacionTabla tbody').on('click', 'i.fa-trash', function () {
        var data = table.row($(this).parents('tr')).data();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Deseas eliminar este registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Lógica para eliminar el registro
                // Por ejemplo, puedes hacer otra llamada AJAX para eliminar el registro basado en "data.id" u otro campo identificador
                console.log("Eliminar registro con ID:", data.id);
            }
        });
    });
    $("#telefonoEdit").click(function () {
        const location = window.location.search;
        const elementos = location.split("&");
        const idRegistro = parseInt(elementos[1]);
        Swal.fire({
            title: 'Ingrese número de teléfono',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Modificar',
            showLoaderOnConfirm: true,
            preConfirm: (telefono) => {
                var campo = 'telefono';
                var tabla = 'empleados';
                console.log(campo);

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarEmpleado.php',
                    data: {
                        valor: telefono,
                        id: idRegistro,
                        campo: campo,
                        usuario: usuario,
                        tabla: tabla,
                    },
                    dataType: 'json'
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(response.message);
                    }
                    // No es necesario llamar a response.json() aquí, ya que es un objeto JSON.
                    return response;
                }).catch(error => {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Operación exitosa',
                    text: 'El valor se ha actualizado correctamente',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                cargarEmpleado(idRegistro);
            }
        });
    });
    $("#emailEdit").click(function () {
        const location = window.location.search;
        const elementos = location.split("&");
        const idRegistro = parseInt(elementos[1]);
        Swal.fire({
            title: 'Ingrese correo eléctronico',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Modificar',
            showLoaderOnConfirm: true,
            preConfirm: (telefono) => {
                var campo = 'email';
                var tabla = 'empleados';

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarEmpleado.php',
                    data: {
                        valor: telefono,
                        id: idRegistro,
                        campo: campo,
                        usuario: usuario,
                        tabla: tabla,
                    },
                    dataType: 'json'
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(response.message);
                    }
                    // No es necesario llamar a response.json() aquí, ya que es un objeto JSON.
                    return response;
                }).catch(error => {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Operación exitosa',
                    text: 'El valor se ha actualizado correctamente',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });

                cargarEmpleado(idRegistro);
            }
        });
    });
    $("#estadoCivilEdit").click(function () {
        const location = window.location.search;
        const elementos = location.split("&");
        const idRegistro = parseInt(elementos[1]);
        Swal.fire({
            title: 'Seleccione Estado Civil',
            input: 'select',
            inputOptions: {
                1: 'Soltero(a)',
                2: 'Casado(a)',
                3: 'Viudo(a)',
                4: 'Divoriado(a)',
                5: 'Separado(a)',
                6: 'Unión Libre',

            },
            inputPlaceholder: 'Seleccione...',
            showCancelButton: true,
            confirmButtonText: 'Modificar',
            showLoaderOnConfirm: true,
            preConfirm: (valor) => {
                var campo = 'estadoCivil';
                var tabla = 'empleados';

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarEmpleado.php',
                    data: {
                        valor: valor,
                        id: idRegistro,
                        campo: campo,
                        usuario: usuario,
                        tabla: tabla,
                    },
                    dataType: 'json'
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(response.message);
                    }
                    // No es necesario llamar a response.json() aquí, ya que es un objeto JSON.
                    return response;
                }).catch(error => {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Operación exitosa',
                    text: 'El valor se ha actualizado correctamente',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                cargarEmpleado(idRegistro);
            }
        });
    });
    $("#centroMedicoEdit").click(function () {
        const location = window.location.search;
        const elementos = location.split("&");
        const idRegistro = parseInt(elementos[1]);
        Swal.fire({
            title: 'Ingrese el centro médico de preferencia',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Modificar',
            showLoaderOnConfirm: true,
            preConfirm: (telefono) => {
                var campo = 'centroMedico';
                var tabla = 'salud';

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarEmpleado.php',
                    data: {
                        valor: telefono,
                        id: idRegistro,
                        campo: campo,
                        usuario: usuario,
                        tabla: tabla,
                    },
                    dataType: 'json'
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(response.message);
                    }
                    // No es necesario llamar a response.json() aquí, ya que es un objeto JSON.
                    return response;
                }).catch(error => {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Operación exitosa',
                    text: 'El valor se ha actualizado correctamente',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                cargaInfoSalud(idRegistro);
            }
        });
    });
    $("#emergenciasEdit").click(function () {
        const location = window.location.search;
        const elementos = location.split("&");
        const idRegistro = parseInt(elementos[1]);
        Swal.fire({
            title: 'Información Médico',
            html: `<input type="input" id="contacto" class="swal2-input" placeholder="Médico de cabezera">
            <input type="input" id="tel" class="swal2-input" placeholder="Teléfono Médico">`,
            confirmButtonText: 'Modificar',
            focusConfirm: false,
            preConfirm: () => {
                const valor = Swal.getPopup().querySelector('#contacto').value
                const valor2 = Swal.getPopup().querySelector('#tel').value
                var campo = 'contactoEmergencia1';
                var campo2 = 'tel1';
                var tabla = 'salud';

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarEmpleado2.php',
                    data: {
                        valor: valor,
                        valor2: valor2,
                        id: idRegistro,
                        campo: campo,
                        campo2: campo2,
                        usuario: usuario,
                        tabla: tabla,
                    },
                    dataType: 'json'
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(response.message);
                    }
                    // No es necesario llamar a response.json() aquí, ya que es un objeto JSON.
                    return response;
                }).catch(error => {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
                return { login: login, password: password }
            }
        }).then((result) => {
            cargaInfoSalud(idRegistro)
        })

    });
    $("#emergencias2Edit").click(function () {
        const location = window.location.search;
        const elementos = location.split("&");
        const idRegistro = parseInt(elementos[1]);
        Swal.fire({
            title: 'Información Médico',
            html: `<input type="input" id="contacto" class="swal2-input" placeholder="Médico de cabezera">
            <input type="input" id="tel" class="swal2-input" placeholder="Teléfono Médico">`,
            confirmButtonText: 'Modificar',
            focusConfirm: false,
            preConfirm: () => {
                const valor = Swal.getPopup().querySelector('#contacto').value
                const valor2 = Swal.getPopup().querySelector('#tel').value
                var campo = 'contactoEmergencia2';
                var campo2 = 'tel2';
                var tabla = 'salud';

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarEmpleado2.php',
                    data: {
                        valor: valor,
                        valor2: valor2,
                        id: idRegistro,
                        campo: campo,
                        campo2: campo2,
                        usuario: usuario,
                        tabla: tabla,
                    },
                    dataType: 'json'
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(response.message);
                    }
                    // No es necesario llamar a response.json() aquí, ya que es un objeto JSON.
                    return response;
                }).catch(error => {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
                return { login: login, password: password }
            }
        }).then((result) => {
            cargaInfoSalud(idRegistro)
        })

    });
    $("#medicoEdit").click(function () {
        const location = window.location.search;
        const elementos = location.split("&");
        const idRegistro = parseInt(elementos[1]);
        Swal.fire({
            title: 'Información Médico',
            html: `<input type="input" id="medico" class="swal2-input" placeholder="Médico de cabezera">
            <input type="input" id="telMedico" class="swal2-input" placeholder="Teléfono Médico">`,
            confirmButtonText: 'Modificar',
            focusConfirm: false,
            preConfirm: () => {
                const medico = Swal.getPopup().querySelector('#medico').value
                const telMedico = Swal.getPopup().querySelector('#telMedico').value
                var campo = 'medico';
                var campo2 = 'telMedico';
                var tabla = 'salud';

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarEmpleado2.php',
                    data: {
                        valor: medico,
                        valor2: telMedico,
                        id: idRegistro,
                        campo: campo,
                        campo2: campo2,
                        usuario: usuario,
                        tabla: tabla,
                    },
                    dataType: 'json'
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(response.message);
                    }
                    // No es necesario llamar a response.json() aquí, ya que es un objeto JSON.
                    return response;
                }).catch(error => {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
                return { login: login, password: password }
            }
        }).then((result) => {
            cargaInfoSalud(idRegistro)
        })

    });
    $("#direccionEdit").click(function () {
        const location = window.location.search;
        const elementos = location.split("&");
        const idRegistro = parseInt(elementos[1]);
        Swal.fire({
            title: '¿Está seguro de cambiar la dirección?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si, guardar',
            denyButtonText: `No, gracias`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                let datos = {
                    direccion:$('#nuevaDireccion').val(),
                    zona: $('#direccion').text(),
                    lat: $('#lat').text(),
                    long: $('#long').text(),
                    idEmpleado: idRegistro,
                    usuario: 1,
                }
                if (datos.direccion === '' || datos.direccion === null 
                   
                ) {
                    Swal.fire('Falta información, intenta de nuevo.')

                } else {
                    return $.ajax({
                        type: 'POST',
                        url: './sections/empleado/controller/modificar/agregarDireccion.php',
                        data: {
                            datos: datos,

                        },
                        dataType: 'json'
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error(response.message);
                        }
                        // No es necesario llamar a response.json() aquí, ya que es un objeto JSON.
                        cargarEmpleado(idRegistro) 
                        $("#nuevaDireccion").hide();
                    }).catch(error => {
                        Swal.showValidationMessage(`Request failed: ${error}`);
                    });
                }
            } else if (result.isDenied) {
              Swal.fire('Los cambios no fueron realizados.', '', 'info')
            }
          })


    });
    $("#educacionEdit").click(function () {
        const location = window.location.search;
        const elementos = location.split("&");
        const idRegistro = parseInt(elementos[1]);
        Swal.fire({
            title: 'Información Médico',
            html: `
                    <label class="">Nivel</label><br>        
                    <select class="swal2" placeholder="Nivel" id="nivel">
						<option class="text-center"></option>
						<option value="Primaria" class="text-center">Primaria</option>
						<option value="Secundaria" class="text-center">Secundaria</option>
						<option value="Pregrado" class="text-center">Pregrado</option>
						<option value="Postgrado" class="text-center">Postgrado</option>
						<option value="Curso" class="text-center">Curso</option>
						<option value="Seminario" class="text-center">Seminario</option>
					</select>
                    <input type="input" id="centro" class="swal2-input" placeholder="Centro de Estudio">
                    <input type="input" id="titulo" class="swal2-input" placeholder="Titulación">
                    <input type="input" id="lugar" class="swal2-input" placeholder="Lugar">
                    <input type="input" id="desde" class="swal2-input" placeholder="Desde">
                    <input type="input" id="hasta" class="swal2-input" placeholder="Hasta">
                
                    `,
            confirmButtonText: 'Modificar',
            focusConfirm: false,
            preConfirm: () => {

                let datos = {
                    nivel: Swal.getPopup().querySelector('#nivel').value,
                    centro: Swal.getPopup().querySelector('#centro').value,
                    titulo: Swal.getPopup().querySelector('#titulo').value,
                    lugar: Swal.getPopup().querySelector('#lugar').value,
                    desde: Swal.getPopup().querySelector('#desde').value,
                    hasta: Swal.getPopup().querySelector('#hasta').value,
                    idEmpleado: idRegistro,
                    usuario: 1,
                }
                if (datos.nivel === '' || datos.nivel === null ||
                    datos.centro === '' || datos.centro === null ||
                    datos.titulo === '' || datos.titulo === null ||
                    datos.lugar === '' || datos.lugar === null ||
                    datos.desde === '' || datos.desde === null ||
                    datos.hasta === '' || datos.hasta === null ||
                    datos.idEmpleado === '' || datos.idEmpleado === null
                ) {
                    Swal.fire('Falta información, intenta de nuevo.')

                } else {
                    return $.ajax({
                        type: 'POST',
                        url: './sections/empleado/controller/modificar/agregarEducacion.php',
                        data: {
                            datos: datos,

                        },
                        dataType: 'json'
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error(response.message);
                        }
                        // No es necesario llamar a response.json() aquí, ya que es un objeto JSON.
                        return response;
                    }).catch(error => {
                        Swal.showValidationMessage(`Request failed: ${error}`);
                    });
                }


            }
        }).then((result) => {
            $('#educacionTabla').DataTable({
                destroy: true,
                // other options
            });
            cargarEducacion(idRegistro)
        })

    });
    $('#parentescoTabla tbody').on('click', '.icon-delete', function() {
        // Localizar el tr padre directo de donde está el icono
        var childTableTr = $(this).closest('tr');
        
        // Ahora, obtenemos el tr que precede a este (el tr principal que tiene el data-idHistorial)
        var mainTr = childTableTr.prev();
        
        // Capturamos el valor de data-idHistorial
        var idHistorial = mainTr.attr('data-idhistorial');
        
        console.log(idHistorial); 
        eliminarRegistro(idHistorial,"historiaFamiliar");
    });

});


//* Funciones de carga

function cargarEmpleado(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/cargar/cargarDatosGenerales.php",
        data: {
            dni: id
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
                let genero = '';
                if (datos.genero == 1) {
                    genero = 'Femenino';
                } else {
                    genero = 'Masculino';
                }

                $("#noIdentidad").text(datos.DNI).change();
                $("#nombreCompleto").text(datos.nombreCompleto).change();
                $("#fechaNacimiento").text(formatarFecha(datos.fechaNacimiento)).change();
                $("#lugarNacimiento").text(datos.lugarNacimiento).change();
                $("#nacionalidad").text(datos.nacionalidad).change();
                $("#estadoCivil").text(datos.descEstadoCivil).change();
                $("#telefono").text(datos.telefono).change();
                $("#email").text(datos.email).change();
                $("#genero").text(genero).change();
                $("#direccion").html( datos.zona).change();
                $("#direccion1").html(datos.direccion).change();

                var marker = L.marker([datos.latitud, datos.longitud], { icon: customIcon, draggable: true }).addTo(myMap);

                // Centra el mapa en las coordenadas iniciales
                myMap.setView([datos.latitud, datos.longitud], 13); // Puedes ajustar el nivel de zoom (13 en este ejemplo) según tus necesidades
               
                // Agrega un evento para detectar cuando el marcador se arrastra
                marker.on('dragend', function (event) {
                    var marker = event.target;  // Obtén el marcador que se arrastró
                    var position = marker.getLatLng();  // Obtén la nueva posición del marcador
                    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${position.lat}&lon=${position.lng}`)
                        .then(response => response.json())
                        .then(data => {
                            var addressTextarea = document.getElementById('direccion');
                            addressTextarea.innerHTML = data.display_name; // Mostrar la dirección en el cuadro de texto
                            $('#nuevaDireccion').show();
                            $('#direccion1').text('');
                            $('#lat').text(position.lat);
                            $('#long').text(position.lng);
                        });

                });
            } else {
                console.log("No se cargaron los datos del empleado")
            }


        },
    });
}
function cargarHistoriaFamiliar(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/cargar/cargarHistoriaFamiliar.php",
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
            var table = $('#parentescoTabla').DataTable({
                data: respuesta, // Los datos obtenidos de AJAX
                columns: [
                    { data: 'parentesco' },
                    { data: 'nombre' },
                    { data: 'fechaNacimiento', class: 'text-center' },
                    // ... Agrega más columnas según sea necesario
                ],
                columnDefs: [{
                    targets: 2, // La columna de fecha de nacimiento (comenzando desde 0)
                    render: function (data, type, row) {
                        // Si el tipo es 'display' o 'filter', calcula y muestra la edad
                        if (type === 'display' || type === 'filter') {
                            return calcularEdad(data);
                        }
                        // De lo contrario, devuelve el valor original (esto es para la ordenación, búsqueda, etc.)
                        return data;
                    }
                }],
                createdRow: function(row, data, dataIndex) {
                    // Aquí añades las clases a la fila basadas en idHistorial e idEmpleado
                    $(row).attr('data-idEmpleado', data.idEmpleado);
                    $(row).attr('data-idHistorial', data.idHistorial);
                },
                responsive: true,
                ordering: false, // Desactiva la ordenación
                searching: false, // Desactiva la búsqueda
                paging: false,   // Desactiva la paginación
                info: false,     // Habilitar DataTables Responsive
                rowReorder: {
                    selector: 'td:first-child', // Selector para las filas que se pueden reordenar (primera columna)
                    update: false, // No permitir la actualización automática del orden
                },
            });

            // Manejar el clic en una fila para mostrar la información adicional como una child table
            $('#parentescoTabla tbody').on('click', 'tr', function () {
                var tr = $(this);
                var row = table.row(tr);
                if (row.child.isShown()) {
                    // Ocultar la child table si ya se muestra
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Mostrar la child table
                    row.child(formatChildTable(row.data())).show();
                    tr.addClass('shown');
                }
            });
        },
    });
}
function cargarConocidos(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/cargar/cargarConocidos.php",
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
            console.log(respuesta);
            if (respuesta.length > 0) {
                // Selecciona la tabla por su ID
                var tabla2 = $("#parentescoConocidosTabla");


                $("#parientesConocidosCheck").trigger("click");
                $.each(respuesta, function (index, registro) {

                    var fila2 = $("<tr>");
                    fila2.append($("<td>").text(registro.nombre));
                    fila2.append($("<td>").text(registro.parentesco));
                    fila2.append($("<td>").text(registro.tiempoConocerlo));
                    fila2.append($("<td>").text(registro.empresaLabora));
                    fila2.append($("<td>").html('<button class="btn btn-outline-danger" accion="eliminar" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button>'));
                    // Agrega más celdas según sea necesario

                    // Agrega la fila2 a la tabla
                    tabla2.append(fila2);
                });



            } else {
                console.log("NADA! NADA TRAE ESTA PUERCADA!")
            }


        },
    });
}
function cargaInfoSalud(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/cargar/cargarSalud.php",
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
                let tipoSangre = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-droplet-fill" viewBox="0 0 16 16"><path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6ZM6.646 4.646l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448c.82-1.641 1.717-2.753 2.093-3.13Z"/></svg> ';

                let datos = respuesta[0];
                switch (datos.tipoSangre) {
                    case 'AP': tipoSangre += 'A+'; break;
                    case 'AN': tipoSangre += 'A-'; break;
                    case 'BP': tipoSangre += 'B+'; break;
                    case 'BN': tipoSangre += 'B-'; break;
                    case 'ABP': tipoSangre += 'AB+'; break;
                    case 'ABN': tipoSangre += 'AB-'; break;
                    case 'OP': tipoSangre += 'O+'; break;
                    case 'ON': tipoSangre += 'O-'; break;
                    default: break;
                }

                $("#emergencia1").text(datos.contactoEmergencia1);
                $("#emergencia2").text(datos.contactoEmergencia2);
                $("#tel1").text(datos.tel1);
                $("#tel2").text(datos.tel2);
                $("#tipoSangre").html(tipoSangre);
                $("#enfermedades").text(datos.enfermedades);
                $("#medico").text(datos.medico);
                $("#telMedico").text(datos.telMedico);
                $("#centroMedico").text(datos.centroMedico);



            } else {
                console.log("NO HAY NADA, ¿POR QUE NO HAY NADA? ... QUE BUENA PREGUNTA")
            }


        },
    });
}
function cargarEducacion(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/cargar/cargarEducacion.php",
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
            var table = $('#educacionTabla').DataTable({
                data: respuesta, // Los datos obtenidos de AJAX
                columns: [
                    { data: 'nivel' },
                    { data: 'centroEducativo' },
                    { data: 'estudio', class: 'text-center' },
                    // ... Agrega más columnas según sea necesario
                ],
                columnDefs: [{

                }],
                destroy: true,
                responsive: true,
                ordering: false, // Desactiva la ordenación
                searching: false, // Desactiva la búsqueda
                paging: false,   // Desactiva la paginación
                info: false,     // Habilitar DataTables Responsive
                rowReorder: {
                    selector: 'td:first-child', // Selector para las filas que se pueden reordenar (primera columna)
                    update: false, // No permitir la actualización automática del orden
                },
            });

            // Manejar el clic en una fila para mostrar la información adicional como una child table
            $('#educacionTabla tbody').on('click', 'tr', function () {
                var tr = $(this);
                var row = table.row(tr);
                if (row.child.isShown()) {
                    // Ocultar la child table si ya se muestra
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Mostrar la child table
                    row.child(formatChildTableEducacion(row.data())).show();
                    tr.addClass('shown');
                }
            });


        },
    });
}
function cargarReferencias(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/cargar/cargarReferencias.php",
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
            console.log(respuesta);
            if (respuesta.length > 0) {
                // Selecciona la tabla por su ID
                var tabla = $("#referenciasTabla");

                $.each(respuesta, function (index, registro) {

                    var fila = $("<tr>");
                    fila.append($("<td>").text(registro.nombre));
                    fila.append($("<td>").text(registro.profesion));
                    fila.append($("<td>").text(registro.telefono));
                    fila.append($("<td>").text(registro.direccion));
                    fila.append($("<td>").html('<button class="btn btn-outline-danger" accion="eliminar" ><svg xmlns="http://www.w3.org/000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button>'));
                    // Agrega más celdas según sea necesario

                    // Agrega la fila2 a la tabla
                    tabla.append(fila);
                });



            } else {
                console.log("NADA! NADA TRAE ESTA PUERCADA!")
            }


        },
    });
}
function cargarIdiomas(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/cargar/cargarIdiomas.php",
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
            console.log(respuesta);
            if (respuesta.length > 0) {
                // Selecciona la tabla por su ID
                var tabla = $("#idiomasTabla");
                $("#idiomasTabla tbody").text("");
                $.each(respuesta, function (index, registro) {
                    if (registro.porcentaje == 1) {
                        registro.porcentaje = 100;
                    }
                    var fila = $("<tr>");
                    fila.append($("<td class='text-center'>").text(registro.idioma));
                    fila.append($("<td class='text-center' porcentaje='" + registro.porcentaje + "'>").text(registro.porcentaje + "%"));
                    // Agrega más celdas según sea necesario

                    // Agrega la fila2 a la tabla
                    tabla.append(fila);
                });



            } else {
                console.log("NADA! NADA TRAE ESTA PUERCADA!")
            }


        },
    });
}
function cargarEstudiosActuales(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/cargar/cargarEstudios.php",
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
                $("#carrera").val(datos.carrera).change();
                $("#desde").val(datos.horaEntrada + ' - ' + datos.horaSalida).change();
                $("#finalizacion").val(datos.finalizacion).change();

            } else {
                console.log("No hay estudios actuales")
                $("#estudiosActuales").hide();
            }


        },
    });
}
function cargarAntecedentes(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/cargar/cargarAntecedentes.php",
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
                $("#nombreEmpresaInput").val(datos.empresa).change();
                $("#tipoEmpresaInput").val(datos.tipoEmpresa).change();
                $("#dirEmpresaInput").val(datos.direccion).change();
                $("#telEmpresaInput").val(datos.telefono).change();
                $("#ultimoPuestoInput").val(datos.ultimoPuesto).change();
                $("#jefeInmediatoInput").val(datos.jefeInmediato).change();
                $("#telJefeInput").val(datos.telJefe).change();
                $("#ingresoDate").val(datos.ingreso).change();
                $("#retiroDate").val(datos.retiro).change();
                $("#sueldoInicialNumber").val(datos.sueldoInicial).change();
                $("#sueldoFinalNumber").val(datos.sueldoFinal).change();
                $("#causaRetiroInput").val(datos.causaRetiro).change();
                $("#descripcionPuestoInput").val(datos.obligaciones).change();
                let datos2 = respuesta[1];
                $("#nombreEmpresaInput2").val(datos2.empresa).change();
                $("#tipoEmpresaInput2").val(datos2.tipoEmpresa).change();
                $("#dirEmpresaInput2").val(datos2.direccion).change();
                $("#telEmpresaInput2").val(datos2.telefono).change();
                $("#ultimoPuestoInput2").val(datos2.ultimoPuesto).change();
                $("#jefeInmediatoInput2").val(datos2.jefeInmediato).change();
                $("#telJefeInput2").val(datos2.telJefe).change();
                $("#ingresoDate2").val(datos2.ingreso).change();
                $("#retiroDate2").val(datos2.retiro).change();
                $("#sueldoInicialNumber2").val(datos2.sueldoInicial).change();
                $("#sueldoFinalNumber2").val(datos2.sueldoFinal).change();
                $("#causaRetiroInput2").val(datos2.causaRetiro).change();
                $("#descripcionPuestoInput2").val(datos2.obligaciones).change();

            } else {
                console.log("NO HAY NADA, ¿POR QUE NO HAY NADA? ... QUE BUENA PREGUNTA")
            }


        },
    });
}
function formatarFecha(fechaOriginal) {
    var date = new Date(fechaOriginal);
    var options = { year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('es-ES', options);
}

//* Modificación de archivos
function modificarEmpleado(campo, idRegistro) {

    Swal.fire({
        title: 'Ingrese número de teléfono',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Modificar',
        showLoaderOnConfirm: true,
        preConfirm: (telefono) => {
            var campo = campo;
            console.log(campo);

            return $.ajax({
                type: 'POST',
                url: './sections/empleado/controller/modificar/modificarEmpleado.php',
                data: {
                    valor: telefono,
                    id: idRegistro,
                    campo: campo
                },
                dataType: 'json'
            }).then(response => {
                if (!response.ok) {
                    throw new Error(response.message);
                }
                // No es necesario llamar a response.json() aquí, ya que es un objeto JSON.
                return response;
            }).catch(error => {
                Swal.showValidationMessage(`Request failed: ${error}`);
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Operación exitosa',
                text: 'El valor se ha actualizado correctamente',
                icon: 'success',
                confirmButtonText: 'OK'
            });
            $("#telefono").text(tel);
        }
    });
}
function eliminarRegistro(id,tabla) {
    // Confirmación para eliminar
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Aquí puedes llamar a un AJAX para eliminar el registro en la base de datos
            $.ajax({
                type: "POST",
                url: "./sections/empleado/controller/modificar/eliminar.php",
                data: { id: id , tabla:tabla},
                success: function(response) {
                    if (response.success) {
                        Swal.fire(
                            'Eliminado!',
                            'El registro ha sido eliminado.',
                            'success'
                        );
                        // Recargar o actualizar la tabla para reflejar el cambio
                    } else {
                        Swal.fire('Error', 'Hubo un error al eliminar.', 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Hubo un error en la petición.', 'error');
                }
            });
        }
    });
}

//* Funciones operativas
function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    return edad;
}


//*Crear las filas hijas de las tablas, el colapsar la tabla

function formatChildTable(data) {
    console.log(data);
    var html = '<table class="child-table">';
    html += '<tr><td>Teléfono:</td><td>' + data.telefono + '</td></tr>';
    html += '<tr><td>Dirección:</td><td>' + data.direccion + '</td></tr>';
    html += '<tr><td>Eliminar:</td><td><i class="fa fa-trash icon-delete" data-id="'+ data.id +'" style="color:red;cursor:pointer;"></i></td></tr>';
    html += '</table>';
    return html;
}
function formatChildTableEducacion(data) {
    // Aquí puedes generar el HTML para tu child table utilizando los datos pasados como parámetro (data)
    // Por ejemplo, puedes crear una tabla HTML con la información adicional que deseas mostrar
    // y devolverla como una cadena HTML.
    // Asegúrate de formatear la tabla de acuerdo a tus necesidades.
    var html = '<table class="child-table">';
    // Agrega aquí las filas y columnas para la información adicional
    html += '<tr><td>Lugar:</td><td>' + data.lugar + '</td></tr>';
    html += '<tr><td>Desde:</td><td>' + data.desde + '</td></tr>';
    html += '<tr><td>Hasta:</td><td>' + data.hasta + '</td></tr>';
    // ... Agrega más filas y columnas según sea necesario
    html += '</table>';
    return html;
}