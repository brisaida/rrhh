$(document).ready(function () {
    const location = window.location.search;
    const elementos = location.split("&");
    const idRegistro = parseInt(elementos[1]);
    cargarEmpleado(idRegistro)

});


$("#perfilPage").click(function () {
    const location = window.location.search;
    const elementos = location.split("&");
    const idRegistro = parseInt(elementos[1]);
    window.location.href = `?section=editar&${idRegistro}`

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
                    const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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
                    const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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
                    const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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
                    const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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
                    const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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
                    const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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
                    const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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
                    const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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

$(document).on('change', '#cvFileInput', function() {
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
                const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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

$(document).on('change', '#penFileInput', function() {
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
                const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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

$(document).on('change', '#polFileInput', function() {
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
                const location = window.location.search;
                    const elementos = location.split("&");
                    const idRegistro = parseInt(elementos[1]);
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


             

                //*Cargar fotos
                if (datos.foto) {
                    $("#foto").attr("src", "./sections/empleado/archivos/empleado/" + datos.foto);
                    $("#fotoDescargar").attr("href", "./sections/empleado/archivos/empleado/" + datos.foto);
                } else {
                    $("#foto").attr("src", "./assets/images/not.png");
                }
                if (datos.pasaporte) {
                    $("#pasaporte").attr("src", "./sections/empleado/archivos/pasaporte/" + datos.pasaporte);
                    $("#vencimientoPasaporte").text(datos.vencimientoPasaporte);
                } else {
                    $("#pasaporte").attr("src", "./assets/images/not.png");
                }
                if (datos.licenciaCarroFront && datos.licenciaCarroBack) {
                    $("#vencimientoLicenciaCarro").text(datos.vencimientoLicencia);
                    $("#carroFrente").attr("src", "./sections/empleado/archivos/licencia_carro/" + datos.licenciaCarroFront);
                    $("#carroReverso").attr("src", "./sections/empleado/archivos/licencia_carro/" + datos.licenciaCarroBack);
                    $("#idFrontDescargar").attr("href", "./sections/empleado/archivos/licencia_carro/" + datos.licenciaCarroFront);
                    $("#idReversoDescargar").attr("href", "./sections/empleado/archivos/licencia_carro/" + datos.licenciaCarroBack);
                    
                } else {
                    $("#carroFrente").attr("src", "./assets/images/not.png");
                    $("#carroReverso").attr("src", "./assets/images/not.png");
                }
                if (datos.licenciaMotoFront && datos.licenciaMotoBack) {
                    $("#vencimientoLicenciaMoto").text(datos.vencimientoLicenciaMoto);
                    $("#motoFrente").attr("src", "./sections/empleado/archivos/licencia_moto/" + datos.licenciaMotoFront);
                    $("#motoReverso").attr("src", "./sections/empleado/archivos/licencia_moto/" + datos.licenciaMotoBack);
                } else {
                    $("#motoFrente").attr("src", "./assets/images/not.png");
                    $("#motoReverso").attr("src", "./assets/images/not.png");
                }
                if (datos.dniFront && datos.dniBack) {
                    $("#idFrente").attr("src", "./sections/empleado/archivos/dni/" + datos.dniFront);
                    $("#idReverso").attr("src", "./sections/empleado/archivos/dni/" + datos.dniBack);
                }


                //* Cargar documentos
                if (datos.cv) {
                    $("#cvDescargar").attr("href", "./sections/empleado/archivos/cv/" + datos.cv);
                    $("#cvCambiar").html("<strong>Cambiar</strong>");
                    $("#cvContent").show();
                } else { 
                    $("#cvCambiar").html("<strong>Agregar</strong>");
                    $("#cvContent").hide();
                }
                if (datos.penales) {
                    $("#apDescargar").attr("href", "./sections/empleado/archivos/antecedentes_penales/" + datos.penales);
                    $("#apCambiar").html("<strong>Cambiar</strong>");
                    $("#penContent").show();
                } else {
                    $("#apCambiar").html("<strong>Agregar</strong>");
                    $("#penContent").hide();
                }
                if (datos.policiales) {
                    $("#apolDescargar").attr("href", "./sections/empleado/archivos/antecedentes_policiales/" + datos.policiales);
                    $("#apolCambiar").html("<strong>Cambiar</strong>");
                    $("#polContent").show();
                } else {
                    $("#apolCambiar").html("<strong>Agregar</strong>");
                    $("#polContent").hide();
                }


            } else {
                console.log("No se cargaron los datos del empleado")
            }


        },
    });
}
