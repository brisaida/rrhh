$(document).ready(function () {
    var usuario = 1;

    var idRegistro=ID();
    console.log(idRegistro);
    editar = true;

    $('.no-editable').attr('disabled');
    $('#revisarBtn').hide();
    $('.adjuntos').show();
    $('.esconder').hide();
    $('.ocultar').hide();
    $('#nuevaDireccion').hide();
    $('#lat').hide();
    $('#long').hide();
    cargarEmpleado(idRegistro);
    cargarHistoriaFamiliar(idRegistro)
    cargaInfoSalud(idRegistro)
    cargarEducacion(idRegistro)
    cargarIdiomas(idRegistro)
    cargarEstudiosActuales(idRegistro)
    cargarAntecedentes(idRegistro)



    //* Llamados a la modificación de datos (Botones de modificar)
    $("#adjuntosPage").click(function () {

        window.location.href = `?section=editarAdjuntos`
    });
    $("#telefonoEdit").click(function () {


        var idRegistro=ID();
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


        var idRegistro=ID();
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


        var idRegistro=ID();
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


        var idRegistro=ID();
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


        var idRegistro=ID();
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


        var idRegistro=ID();
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


        var idRegistro=ID();
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
    $("#enfermedadesEdit").click(function () {


        var idRegistro=ID();
        Swal.fire({
            title: 'Información Médico',
            html: `<input type="input" id="enfermedades" class="swal2-input" placeholder="Enfermedades de base">`,
            confirmButtonText: 'Modificar',
            focusConfirm: false,
            preConfirm: () => {
                const valor = Swal.getPopup().querySelector('#enfermedades').value
                var campo = 'enfermedades';
                var tabla = 'salud';

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
                return { login: login, password: password }
            }
        }).then((result) => {
            cargaInfoSalud(idRegistro)
        })

    });
    $("#direccionEdit").click(function () {


        var idRegistro=ID();
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
                    direccion: $('#nuevaDireccion').val(),
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


        var idRegistro=ID();
        Swal.fire({
            title: 'Información Académica',
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
                        var data = $("#curso").attr("idestudios");
                        var marca = $("#marcarFinalizado").data("marca");

                        if (marca == 1) {
                            eliminarRegistro(data, "estudiosActuales", "idEstudiante", marca)

                        }
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
    $('#parentescoTabla tbody').on("click", ".delete-icon", function () {
        var data = $(this).closest("tr").data("idhistorial");
        var id = $(this).closest("tr").data("idEmpleado");
        eliminarRegistro(data, "historiaFamiliar", "idHistorial", id)

    });
    $("#agregarFamiliar").click(function () {
        $('.esconder').show();
    });
    $("#agregarEstudios").click(function () {
        $('.ocultar').show();
    });
    $("#guardarFamiliar").click(function () {


        var idRegistro=ID();
        let datos = {
            parentesco: $('#parentesco').val(),
            nombre: $('#nombre').val(),
            fecha: $('#fecha').val(),
            tel: $('#tel').val(),
            dir: $('#dir').val(),
            idEmpleado: idRegistro,
            usuario: 1,
        }
        if (datos.parentesco === '' || datos.parentesco === null ||
            datos.nombre === '' || datos.nombre === null ||
            datos.fecha === '' || datos.fecha === null ||
            datos.tel === '' || datos.tel === null ||
            datos.dir === '' || datos.dir === null ||
            datos.idEmpleado === '' || datos.idEmpleado === null
        ) {
            Swal.fire('Falta información, intenta de nuevo.')

        } else {
            agregarFamiliar(datos);
        }
    });
    $('#idiomasTabla tbody').on("click", ".edit", function () {
        var data = $(this).closest("tr").data("id");



        var idRegistro=ID();

        Swal.fire({
            title: 'Ingrese nivel 1-100',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Modificar',
            showLoaderOnConfirm: true,
            preConfirm: (telefono) => {
                var campo = 'porcentaje';
                var tabla = 'idiomas';
                var condicion = 'idIdioma';

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarOtraCampo.php',
                    data: {
                        valor: telefono,
                        id: data,
                        campo: campo,
                        usuario: usuario,
                        tabla: tabla,
                        condicion: condicion,
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

                cargarIdiomas(idRegistro);
            }
        });

    });

    $("#agregarIdioma").click(function () {


        var idRegistro=ID();
        Swal.fire({
            title: 'Agregar Idioma',
            html: `<input type="input" id="idioma" class="swal2-input" placeholder="Idioma">
            <input type="input" id="porcentaje" class="swal2-input" placeholder="Porcentaje">`,
            confirmButtonText: 'Modificar',
            focusConfirm: false,
            preConfirm: () => {
                const idioma = Swal.getPopup().querySelector('#idioma').value
                const porcentaje = Swal.getPopup().querySelector('#porcentaje').value

                datos = {
                    idioma: idioma,
                    porcentaje: porcentaje,
                    idEmpleado: idRegistro,
                    usuario: 1
                }


                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/agregarIdioma.php',
                    data: {
                        datos: datos,
                    },
                    dataType: 'json'
                }).then(response => {
                    if (!response.ok) {
                        throw new Error(response.message);
                    }
                    return response;
                }).catch(error => {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
                return { login: login, password: password }
            }
        }).then((result) => {
            cargarIdiomas(idRegistro)
        })

    });
    $('#idiomasTabla tbody').on("click", ".delete", function () {
        var data = $(this).closest("tr").data("id");

        var id = $(this).closest("tr").data("idEmpleado");
        eliminarRegistro(data, "idiomas", "idIdioma", id)

    });

    $("#guardarEstudios").click(function () {


        var idRegistro=ID();
        let datos = {
            titulo: $('#titulo').val(),
            horario1: $('#hora1').val(),
            horario2: $('#hora2').val(),
            finalizacion: $('#finalizacion').val(),
            idEmpleado: idRegistro,
            usuario: 1,
        }
        if (datos.titulo === '' || datos.titulo === null ||
            datos.horario1 === '' || datos.horario1 === null ||
            datos.horario2 === '' || datos.horario2 === null ||
            datos.finalizacion === '' || datos.finalizacion === null ||
            datos.idEmpleado === '' || datos.idEmpleado === null
        ) {
            Swal.fire('Falta información, intenta de nuevo.')

        } else {
            agregarEstudiosActuales(datos);
        }
    });

    $("#marcarFinalizado").click(function () {
        $("#marcarFinalizado").data("marca", "1");
        $("#educacionEdit").click();
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
                $("#direccion").html(datos.zona).change();
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
                    { data: 'telefono', class: 'text-center' },
                    { data: 'direccion', class: 'text-center' },
                    {

                        render: function (data, types, full, meta) {
                            let menu = ` <center><a class="delete-icon"><i class="fas fa-trash-alt text-danger cursor-pointer"></i></a></center> `;

                            return `${menu}`;

                        },
                    },
                ],
                columnDefs: [{
                    targets: 2,
                    render: function (data, type, row) {
                        if (type === 'display' || type === 'filter') {
                            return calcularEdad(data);
                        }
                        return data;
                    }
                }],
                createdRow: function (row, data, dataIndex) {
                    $(row).attr('data-idEmpleado', data.idEmpleado);
                    $(row).attr('data-idHistorial', data.idHistorial);
                },
                responsive: true,
                ordering: false, // Desactiva la ordenación
                searching: false, // Desactiva la búsqueda
                paging: false,   // Desactiva la paginación
                info: false,     // Habilitar DataTables Responsive
                destroy: true,
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
                console.log("Sin información de conocidos")
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
                console.log("Sin información en la tabla de salud")
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
                    { data: 'estudio', class: 'text-start' },
                    { data: 'desde', class: 'text-center' },
                    { data: 'hasta', class: 'text-start' },
                    { data: 'lugar', class: 'text-center' },

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
                console.log("Sin información en referencias")
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
            if (respuesta.length > 0) {
                // Selecciona la tabla por su ID
                var tabla = $("#idiomasTabla");
                $("#idiomasTabla tbody").text("");
                $.each(respuesta, function (index, registro) {
                    if (registro.porcentaje == 1) {
                        registro.porcentaje = 100;
                    }
                    var fila = $("<tr data-id=" + registro.idIdioma + " data-idEmpleado=" + registro.idEmpleado + ">");
                    fila.append($("<td class='text-center'>").text(registro.idioma));
                    fila.append($("<td class='text-center' porcentaje='" + registro.porcentaje + "'>").text(registro.porcentaje + "%"));
                    if (index !== 0) {
                        fila.append($("<td class='text-center text-success'>").html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="edit bi bi-pencil cursor-pointer" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash delete text-danger cursor-pointer ml-1" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/></svg>'));
                    }
                    tabla.append(fila);
                });



            } else {
                console.log("Sin información de idiomas")
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
                $("#actual").show();
                $("#noHayEstudios").hide();
                $("#curso").text(datos.carrera);
                $("#curso").attr("idEstudios", datos.idEstudiante);
                $("#horarios").text(datos.horaEntrada + ' - ' + datos.horaSalida);
                $("#final").text(datos.finalizacion);

            } else {
                console.log("No hay estudios actuales")
                $("#actual").hide();
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
                $("#empresa1").text(datos.empresa);
                $("#tipoEmpresa").text(datos.tipoEmpresa);
                $("#direccionEmpresa").text(datos.direccion);
                $("#telEmpresa").text(datos.telefono);
                $("#ultimoPuesto").text(datos.ultimoPuesto);
                $("#jefeInmediato").text(datos.jefeInmediato);
                $("#teljefe").text(datos.telJefe);
                $("#ingreso").text(datos.ingreso);
                $("#retiro").text(datos.retiro);
                $("#sueldoInicio").text(datos.sueldoInicial);
                $("#sueldoFinal").text(datos.sueldoFinal);
                $("#causaRetiro").text(datos.causaRetiro);
                $("#descripcion").text(datos.obligaciones);
                let datos2 = respuesta[1];
                $("#empresa2").text(datos2.empresa);
                $("#tipoEmpresa2").text(datos2.tipoEmpresa);
                $("#direccionEmpresa2").text(datos2.direccion);
                $("#telEmpresa2").text(datos2.telefono);
                $("#ultimoPuesto2").text(datos2.ultimoPuesto);
                $("#jefeInmediato2").text(datos2.jefeInmediato);
                $("#telJefe2").text(datos2.telJefe);
                $("#ingreso2").text(datos2.ingreso);
                $("#retiro2").text(datos2.retiro);
                $("#sueldoInicio2").text(datos2.sueldoInicial);
                $("#sueldoFinal2").text(datos2.sueldoFinal);
                $("#causaRetiro2").text(datos2.causaRetiro);
                $("#descripcion2").text(datos2.obligaciones);

            } else {
                console.log("Sin información en antecedentes laborales")
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
function eliminarRegistro(id, tabla, campo, marca) {
    if (marca == 1) {

        $.ajax({
            type: "POST",
            url: "./sections/empleado/controller/modificar/eliminar.php",
            data: {
                id: id,
                tabla: tabla,
                campo: campo
            },
            error: function (error) {
                Swal.fire({
                    title: "Ficha del empelado",
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
                localStorage.clear();
                cargarHistoriaFamiliar(datos.idEmpleado)
                $('#actual').hide();
                $('#noHayEstudios').show();


            },
        });


    } else {
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
                $.ajax({
                    type: "POST",
                    url: "./sections/empleado/controller/modificar/eliminar.php",
                    data: {
                        id: id,
                        tabla: tabla,
                        campo: campo
                    },
                    dataType: 'json',
                    success: function (response) {
                        Swal.fire(
                            'Eliminado!',
                            'El registro ha sido eliminado.',
                            'success'
                        );


                        var idRegistro=ID();
                        if (tabla == 'historiaFamiliar') {

                            cargarHistoriaFamiliar(idRegistro)
                        }
                        if (tabla == 'idiomas') {
                            cargarIdiomas(idRegistro)
                        }
                    },
                    error: function (response) {
                        Swal.fire('Error', 'Hubo un error en la petición.', response);
                    }
                });
            }
        });
    }
}

function agregarFamiliar(datos) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/modificar/agregarFamiliar.php",
        data: {
            datos: datos,
        },
        error: function (error) {
            Swal.fire({
                title: "Ficha del empelado",
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
            localStorage.clear();
            cargarHistoriaFamiliar(datos.idEmpleado)
            $('.esconder').hide();
            $('.esconder').val('');


        },
    });
}
function agregarEstudiosActuales(datos) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/modificar/agregarEstudios.php",
        data: {
            datos: datos,
        },
        error: function (error) {
            Swal.fire({
                title: "Ficha del empelado",
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
            localStorage.clear();
            cargarEstudiosActuales(datos.idEmpleado)
            $('.ocultar').hide();
            $('.ocultar').val('');


        },
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

function ID(){
    var idRegistro;
    const location = window.location.search;
    const elementos = location.split("&");
    if (parseInt(elementos[1])) {
        idRegistro = parseInt(elementos[1]);
    } else {
        idRegistro = $("#user-dropdown-toggle").data('id');
    }
    return idRegistro
}


