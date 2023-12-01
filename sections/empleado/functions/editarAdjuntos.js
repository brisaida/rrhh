$(document).ready(function () {
    
        var idRegistro;
        const location = window.location.search;
        const elementos = location.split("&");
        if (parseInt(elementos[1])) {

            idRegistro = parseInt(elementos[1]);
        } else {
            idRegistro = $("#user-dropdown-toggle").data('id');
        }
        
    cargarEmpleado(idRegistro)
    console.log(idRegistro)
    $("#noHayFoto").hide();
    $("#noHayIdFront").hide();
    $("#noHayIdBack").hide();
    $("#noHayCarroFront").hide();
    $("#noHayCarroBack").hide();
    $("#noHayMotoFront").hide();
    $("#noHayMotoBack").hide();
    $("#noHayPasaporte").hide();
    
    setTimeout(function() {
    if ($('#agregarBoton').text().trim() === '') {
            $('#agregarContent').hide();
        } 
      }, 5000);
   

    $('#agregarBoton').on('click', '#agregarPasaporte', function() {
        $("#editVencimientoPasaporte").click();
    });
    $('#agregarBoton').on('click', '#agregarCarro', function() {
        $("#editVencimientoCarro").click();
    });
    $('#agregarBoton').on('click', '#agregarMoto', function() {
        $("#editVencimientoMoto").click();
    });

    $("#editVencimientoCarro").click(function () {
        
        
        const idRegistro = $("#user-dropdown-toggle").data('id');
        Swal.fire({
            title: 'Ingrese fecha de vencimiento',
            input: 'date',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Modificar',
            showLoaderOnConfirm: true,
            preConfirm: (vencimiento) => {
                var campo = 'vencimientoLicencia';
                var tabla = 'empleados';
                var usuario = 1;

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarEmpleado.php',
                    data: {
                        valor: vencimiento,
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
    $("#editVencimientoMoto").click(function () {
        
        
        const idRegistro = $("#user-dropdown-toggle").data('id');
        Swal.fire({
            title: 'Ingrese fecha de vencimiento',
            input: 'date',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Modificar',
            showLoaderOnConfirm: true,
            preConfirm: (vencimiento) => {
                var campo = 'vencimientoLicenciaMoto';
                var tabla = 'empleados';
                var usuario = 1;

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarEmpleado.php',
                    data: {
                        valor: vencimiento,
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
    $("#editVencimientoPasaporte").click(function () {
        
        
        const idRegistro = $("#user-dropdown-toggle").data('id');
        Swal.fire({
            title: 'Ingrese fecha de vencimiento',
            input: 'date',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Modificar',
            showLoaderOnConfirm: true,
            preConfirm: (vencimiento) => {
                var campo = 'vencimientoPasaporte';
                var tabla = 'empleados';
                var usuario = 1;

                return $.ajax({
                    type: 'POST',
                    url: './sections/empleado/controller/modificar/modificarEmpleado.php',
                    data: {
                        valor: vencimiento,
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

});


$("#perfilPage").click(function () {
    var idRegistro;
        const location = window.location.search;
        const elementos = location.split("&");
        if (parseInt(elementos[1])) {
            idRegistro = parseInt(elementos[1]);
            window.location.href = `?section=editar&${idRegistro}`
        } else {
            idRegistro = $("#user-dropdown-toggle").data('id');
        }

});



//*ACTUALIZAR FOTOS

//*FOTO EMPLEADO
$('#fotoCambiar').click(function () {
    $('#fotoFileInput').click();
});
$('#fotoFileInput').change(function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            Swal.fire({
                title: '¿Deseas guardar esta imagen?',
                imageUrl: e.target.result,
                imageAlt: 'Preview de la imagen',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    
                    const idRegistro = $("#user-dropdown-toggle").data('id');
                    guardarFoto(idRegistro);
                }
            });
        }

        reader.readAsDataURL(this.files[0]);
    }
});
function guardarFoto(idRegistro) {
    const archivos = $('#fotoFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarFotoEmpleado");
}

//*ID FRONT
$('#idFrontCambiar').click(function () {
    $('#idFileInput').click();
});

$('#idFileInput').change(function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            Swal.fire({
                title: '¿Deseas guardar esta imagen?',
                imageUrl: e.target.result,
                imageAlt: 'Preview de la imagen',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    
                    const idRegistro = $("#user-dropdown-toggle").data('id');
                    guardarFotoId(idRegistro);
                }
            });
        }

        reader.readAsDataURL(this.files[0]);
    }
});

function guardarFotoId(idRegistro) {
    const archivos = $('#idFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarDNI");
}

//*ID BACK
$('#idReversoCambiar').click(function () {
    $('#idBackFileInput').click();
});

$('#idBackFileInput').change(function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            Swal.fire({
                title: '¿Deseas guardar esta imagen?',
                imageUrl: e.target.result,
                imageAlt: 'Preview de la imagen',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    
                    const idRegistro = $("#user-dropdown-toggle").data('id');
                    guardarFotoIdBack(idRegistro);
                }
            });
        }

        reader.readAsDataURL(this.files[0]);
    }
});

function guardarFotoIdBack(idRegistro) {
    const archivos = $('#idBackFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarDNIBack");
}

//*CARRO FRONT
$('#carroFrontCambiar').click(function () {
    $('#carroFrontFileInput').click();
});

$('#carroFrontFileInput').change(function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            Swal.fire({
                title: '¿Deseas guardar esta imagen?',
                imageUrl: e.target.result,
                imageAlt: 'Preview de la imagen',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    
                    const idRegistro = $("#user-dropdown-toggle").data('id');
                    guardarFotoFrontCarro(idRegistro);
                }
            });
        }

        reader.readAsDataURL(this.files[0]);
    }
});

function guardarFotoFrontCarro(idRegistro) {
    const archivos = $('#carroFrontFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarCarro");
}

//*CARRO BACK
$('#carroReversoCambiar').click(function () {
    $('#carroBacktFileInput').click();
});

$('#carroBacktFileInput').change(function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            Swal.fire({
                title: '¿Deseas guardar esta imagen?',
                imageUrl: e.target.result,
                imageAlt: 'Preview de la imagen',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    
                    const idRegistro = $("#user-dropdown-toggle").data('id');
                    guardarFotoCarroBack(idRegistro);
                }
            });
        }

        reader.readAsDataURL(this.files[0]);
    }
});

function guardarFotoCarroBack(idRegistro) {
    const archivos = $('#carroBacktFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarCarroBack");
}

//*MOTO FRONT
$('#motoFrenteCambiar').click(function () {
    $('#motoFrontFileInput').click();
});

$('#motoFrontFileInput').change(function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            Swal.fire({
                title: '¿Deseas guardar esta imagen?',
                imageUrl: e.target.result,
                imageAlt: 'Preview de la imagen',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    
                    const idRegistro = $("#user-dropdown-toggle").data('id');
                    guardarMotoFront(idRegistro);
                }
            });
        }

        reader.readAsDataURL(this.files[0]);
    }
});

function guardarMotoFront(idRegistro) {
    const archivos = $('#motoFrontFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarMoto");
}

//*MOTO BACK
$('#motoReversoCambiar').click(function () {
    $('#motoBackFileInput').click();
});

$('#motoBackFileInput').change(function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            Swal.fire({
                title: '¿Deseas guardar esta imagen?',
                imageUrl: e.target.result,
                imageAlt: 'Preview de la imagen',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    
                    const idRegistro = $("#user-dropdown-toggle").data('id');
                    guardarMotoBack(idRegistro);
                }
            });
        }

        reader.readAsDataURL(this.files[0]);
    }
});

function guardarMotoBack(idRegistro) {
    const archivos = $('#motoBackFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarMotoBack");
}
//*PASAPORTE
$('#pasaporteCambiar').click(function () {
    $('#pasaporteFileInput').click();
});

$('#pasaporteFileInput').change(function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            Swal.fire({
                title: '¿Deseas guardar esta imagen?',
                imageUrl: e.target.result,
                imageAlt: 'Preview de la imagen',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    
                    const idRegistro = $("#user-dropdown-toggle").data('id');
                    guardarFotoPasaporte(idRegistro);
                }
            });
        }

        reader.readAsDataURL(this.files[0]);
    }
});

function guardarFotoPasaporte(idRegistro) {
    const archivos = $('#pasaporteFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarPasaporte");
}


//*CARGAR CV
$('#cvCambiar').click(function () {
    $('#cvFileInput').click();
});

$(document).on('change', '#cvFileInput', function () {
    if (this.files && this.files[0]) {
        let fileName = this.files[0].name;

        Swal.fire({
            title: '¿Deseas guardar este archivo?',
            text: 'Nombre del archivo: ' + fileName,
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                
                
                const idRegistro = $("#user-dropdown-toggle").data('id');
                guardarCV(idRegistro);
            }
        });
    }
});

function guardarCV(idRegistro) {
    const archivos = $('#cvFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarCV");
}

//*CARGAR PENALES
$('#apCambiar').click(function () {
    $('#penFileInput').click();
});

$(document).on('change', '#penFileInput', function () {
    if (this.files && this.files[0]) {
        let fileName = this.files[0].name;

        Swal.fire({
            title: '¿Deseas guardar este archivo?',
            text: 'Nombre del archivo: ' + fileName,
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                
                
                const idRegistro = $("#user-dropdown-toggle").data('id');
                guardarPen(idRegistro);
            }
        });
    }
});

function guardarPen(idRegistro) {
    const archivos = $('#penFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarPenales");
}

//*CARGAR POLICIALES
$('#apolCambiar').click(function () {
    $('#polFileInput').click();
});

$(document).on('change', '#polFileInput', function () {
    if (this.files && this.files[0]) {
        let fileName = this.files[0].name;

        Swal.fire({
            title: '¿Deseas guardar este archivo?',
            text: 'Nombre del archivo: ' + fileName,
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                
                
                const idRegistro = $("#user-dropdown-toggle").data('id');
                guardarPol(idRegistro);
            }
        });
    }
});

function guardarPol(idRegistro) {
    const archivos = $('#polFileInput')[0].files;
    subirFoto(archivos, idRegistro, "agregarPoliciales");
}



//*FUNCIONES BDD
function subirFoto(archivos, idRegistro, nombreControlador) {
    var formData = new FormData();

    for (const archivo of archivos) {
        formData.append("archivos[]", archivo);
    }

    formData.append("idRegistro", idRegistro);

    // Realizamos petición
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/fotos/" + nombreControlador + ".php",
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        // Error en la petición
        error: function (error) {

        },
        success: function (respuesta) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Modificado correctamente.',
                showConfirmButton: false,
                timer: 1500
            })
            $("#noHayFoto").hide();
            $("#fotoCambiar").text("Cambiar");
            $("#fotoDescargar").show();
            ocultar();
            cargarEmpleado(idRegistro)
        },
    });
}

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


                $("#agregarBoton").html("");

                //*Cargar fotos
                //*-----------------
                if (datos.foto) {
                    $("#foto").attr("src", "./sections/empleado/archivos/empleado/" + datos.foto);
                    $("#fotoDescargar").attr("href", "./sections/empleado/archivos/empleado/" + datos.foto);
                } else {
                    $("#noHayFoto").show();
                    $("#fotoCambiar").text("Agregar");
                    $("#fotoDescargar").hide();
                }
                //*-----------------
                console.log(datos.vencimientoPasaporte )
                if (datos.vencimientoPasaporte == '1900-01-01') {
                    $("#pasaporteContent").hide();
                    $("#agregarBoton").append('<div class="row mt-2"><a class="btn app-btn-secondary" id="agregarPasaporte">Agregar Pasaporte</a></div>');
                    $("#agregarBoton").show();
                } else {
                    $("#vencimientoPasaporte").text(datos.vencimientoPasaporte)
                    if (datos.pasaporte) {
                        $("#pasaporte").attr("src", "./sections/empleado/archivos/pasaporte/" + datos.pasaporte);
                        $("#pasaporteDescargar").attr("href", "./sections/empleado/archivos/pasaporte/" + datos.pasaporte);
                        
                    } else {
                        $("#noHayPasaporte").show();
                        $("#pasaporteCambiar").text("Agregar");
                        $("#pasaporteDescargar").hide();
                    }
                }

                //*-----------------
                if (datos.vencimientoLicencia == '1900-01-01') {
                    $("#carroContent").hide();
                    $("#agregarBoton").append('<div class="row mt-2"><a class="btn app-btn-secondary " id="agregarCarro">Agregar Licencia de Carro</a></div>');
                    $("#agregarBoton").show();
                } else {
                    $("#vencimientoLicenciaCarro").text(datos.vencimientoLicencia)
                    if (datos.licenciaCarroFront) {
                        $("#carroFrente").attr("src", "./sections/empleado/archivos/licencia_carro/" + datos.licenciaCarroFront);
                        $("#carroFrontDescargar").attr("href", "./sections/empleado/archivos/licencia_carro/" + datos.licenciaCarroFront);

                    } else {
                        $("#noHayCarroFront").show();
                        $("#carroFrontCambiar").text("Agregar");
                        $("#carroFrontDescargar").hide();
                    }
                    if (datos.licenciaCarroBack) {

                        $("#carroReverso").attr("src", "./sections/empleado/archivos/licencia_carro/" + datos.licenciaCarroBack);
                        $("#carroReversoDescargar").attr("href", "./sections/empleado/archivos/licencia_carro/" + datos.licenciaCarroBack);

                    } else {
                        $("#noHayCarroBack").show();
                        $("#carroReversoCambiar").text("Agregar");
                        $("#carroReversoDescargar").hide();
                    }
                }

                //*-----------------
                if (datos.vencimientoLicenciaMoto == '1900-01-01') {

                    $("#motoContent").hide();
                    $("#agregarBoton").append('<div class="row mt-2"><a class="btn app-btn-secondary" id="agregarMoto">Agregar Licencia de Moto</a></div>');
                    $("#agregarBoton").show();
                } else {

                    $("#vencimientoLicenciaMoto").text(datos.vencimientoLicenciaMoto)
                    if (datos.licenciaMotoFront) {
                        $("#motoFrente").attr("src", "./sections/empleado/archivos/licencia_moto/" + datos.licenciaMotoFront);
                        $("#motoFrontDescargar").attr("href", "./sections/empleado/archivos/licencia_moto/" + datos.licenciaMotoFront);
                    } else {
                        $("#noHayMotoFront").show();
                        $("#motoFrenteCambiar").text("Agregar");
                        $("#motoFenteDescargar").hide();
                    }
                    if (datos.licenciaMotoBack) {
                        $("#motoReverso").attr("src", "./sections/empleado/archivos/licencia_moto/" + datos.licenciaMotoBack);
                        $("#motoReversoDescargar").attr("href", "./sections/empleado/archivos/licencia_moto/" + datos.licenciaMotoBack);
                    } else {
                        $("#noHayMotoBack").show();
                        $("#motoReversoCambiar").text("Agregar");
                        $("#motoReversoDescargar").hide();
                    }
                }

                //*-----------------
                if (datos.dniFront) {
                    $("#idFrente").attr("src", "./sections/empleado/archivos/dni/" + datos.dniFront);
                } else {
                    $("#noHayIdFront").show();
                    $("#idFrontCambiar").text("Agregar");
                    $("#idFrontDescargar").hide();
                }
                if (datos.dniBack) {
                    $("#idReverso").attr("src", "./sections/empleado/archivos/dni/" + datos.dniBack);
                } else {
                    $("#noHayIdBack").show();
                    $("#idReversoCambiar").text("Agregar");
                    $("#idReversoDescargar").hide();
                }


                //* Cargar documentos
                if (datos.cv) {
                    $("#cvDescargar").attr("href", "./sections/empleado/archivos/cv/" + datos.cv);
                    $("#cvCambiar").html("Cambiar");
                    $("#cvContent").show();
                } else {
                    $("#cvCambiar").html("Agregar");
                    $("#cvContent").hide();
                }
                if (datos.penales) {
                    $("#apDescargar").attr("href", "./sections/empleado/archivos/antecedentes_penales/" + datos.penales);
                    $("#apCambiar").html("Cambiar");
                    $("#penContent").show();
                } else {
                    $("#apCambiar").html("Agregar");
                    $("#penContent").hide();
                }
                if (datos.policiales) {
                    $("#apolDescargar").attr("href", "./sections/empleado/archivos/antecedentes_policiales/" + datos.policiales);
                    $("#apolCambiar").html("Cambiar");
                    $("#polContent").show();
                } else {
                    $("#apolCambiar").html("Agregar");
                    $("#polContent").hide();
                }


            } else {
                console.log("No se cargaron los datos del empleado")
            }


        },
    });
}

function ocultar() {
    $("#noHayFoto").hide();
    $("#fotoCambiar").text("Cambiar");
    $("#fotoDescargar").show();

    $("#noHayIdFront").hide();
    $("#idFrontCambiar").text("Cambiar");
    $("#idFrontDescargar").show();

    $("#noHayIdBack").hide();
    $("#idReversoCambiar").text("Cambiar");
    $("#idReversoDescargar").show();

    $("#noHayCarroFront").hide();
    $("#carroFrontCambiar").text("Cambiar");
    $("#carroFrontDescargar").show();

    $("#noHayCarroBack").hide();
    $("#carroReversoCambiar").text("Cambiar");
    $("#carroReversoDescargar").show();

    $("#noHayMotoFront").hide();
    $("#motoFrenteCambiar").text("Cambiar");
    $("#motoFrentetDescargar").show();

    $("#noHayMotoBack").hide();
    $("#motoReversoCambiar").text("Cambiar");
    $("#motoReversoDescargar").show();

    $("#noHayPasaporte").hide();
    $("#pasaporteCambiar").text("Cambiar");
    $("#pasaporteDescargar").show();
}
