
/* Esconder controles */
$(".esconder").hide();
$(".esconderEstudios").hide();
$(".adjuntos").hide();

$(document).ready(function () {

    const location = window.location.search;
    const elementos = location.split("&");
    if (elementos.length > 1) {
        idRegistro = parseInt(elementos[1]);
        editar = true;
        $('.no-editable').attr('disabled');
        $('#revisarBtn').hide();
        $('.adjuntos').show();
        $('.no-mostrar').hide();
        cargarEmpleado(elementos[1]);
    }
});


// !Mostrar información
// !------------------------------------------------

/* Si tiene pasaporte */
$("#pasaporteCheck").on("click", function () {
    if ($("#pasaporteCheck:checked").val()) {
        $(".pasaporteDate").show();
    } else {
        $(".pasaporteDate").hide();
        $(".pasaporteDate").val("");
    }
});
/* Si tiene licencia de vehiculo */
$("#licenciaCheck").on("click", function () {
    if ($("#licenciaCheck:checked").val()) {
        $(".carroDate").show();
    } else {
        $(".carroDate").hide();
        $(".carroDate").val("");
    }
});
/* Si tiene licencia de moto */
$("#motoCheck").on("click", function () {

    if ($("#motoCheck:checked").val()) {
        $(".motoDate").show();

    } else {
        $(".motoDate").hide();
        $(".motoDate").val("");
    }
});
/* Si estudia */
$("#estudioActualCheck").on("click", function () {
    if ($("#estudioActualCheck:checked").val()) {
        $(".esconderEstudios").show();
        $("#estudioActualCheck").attr("actual", "1");
    } else {
        $(".esconderEstudios").hide();
        $(".esconderEstudios").val("");
        $("#estudioActualCheck").attr("actual", "0");
    }
});
/* Si tiene parientes conocidos en la empresa */
$("#parientesConocidosCheck").on("click", function () {
    if ($("#parientesConocidosCheck:checked").val()) {
        $(".esconder").show();
        $("#parientesConocidosCheck").attr("conocidos", "1");
    } else {
        $(".esconder").hide();
        $(".esconder").val("");
        $("#parientesConocidosCheck").attr("conocidos", "0");
    }
});


// !Agregar datos a las tablas
// !------------------------------------------------

/* Agregar información en la tabla educación} */
$("#agregarEducacion").on("click", function () {
    let nivel = $.trim($("#nivelEducativoSelect").val());
    let centro = $.trim($("#centroEducativoInput").val());
    let estudios = $.trim($("#carreraInput").val());
    let de = $.trim($("#desdeNumber").val());
    let hasta = $.trim($("#hastaNumber").val());
    let lugar = $.trim($("#lugarInput").val());


    if (nivel.length > 0 &&
        centro.length > 0 &&
        estudios.length > 0 &&
        de.length > 0 &&
        hasta.length > 0 &&
        lugar.length > 0
    ) {
        var htmlTags = '<tr>' +
            '<td>' + nivel + '</td>' +
            '<td>' + centro + '</td>' +
            '<td>' + estudios + '</td>' +
            '<td>' + de + '</td>' +
            '<td>' + hasta + '</td>' +
            '<td>' + lugar + '</td>' +
            '<td> <button class="btn btn-danger" accion="eliminar" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button> </td>' +
            '</tr>';

        $("#nivelEducativoSelect").val("");
        $("#centroEducativoInput").val("");
        $("#carreraInput").val("");
        $("#desdeNumber").val("");
        $("#hastaNumber").val("");
        $("#lugarInput").val("");

    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Parece que nos falta información!'
        })
    }

    $('#educacionTabla tbody').append(htmlTags);
});
/* Agregar información en la tabla idiomas */
$("#agregarIdioma").on("click", function () {
    let idioma = $.trim($("#idiomaInput").val());
    let porcentaje = $.trim($("#porcentajeInput").val());



    if (idioma.length > 0 &&
        porcentaje.length > 0
    ) {
        var htmlTags = '<tr class="aling-items-center text-center">' +
            '<td class="text-center">' + idioma + '</td>' +
            '<td class="text-center" porcentaje="' + porcentaje + '">' + porcentaje + '%</td>' +
            '<td><button accion="eliminar" class="btn btn-outline-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button></td>' +
            '</tr>';

        $("#idiomaInput").val("");
        $("#porcentajeInput").val("");

        $('#idiomasTabla tbody').append(htmlTags);

    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Parece que nos falta información!'
        })
    }

});
/* Agregar información en la tabla de referencias */
$("#agregarReferenciaBtn").on("click", function () {
    let profesion = $.trim($("#profesionReferenciaInput").val());
    let nombre = $.trim($("#nombreReferenciaInput").val());
    let telefono = $.trim($("#telReferenciaInput").val());
    let direccion = $.trim($("#dirReferenciaInput").val());


    if (profesion.length > 0 &&
        nombre.length > 0 &&
        telefono.length > 0 &&
        direccion.length > 0
    ) {
        var htmlTags = '<tr>' +
            '<td>' + nombre + '</td>' +
            '<td>' + profesion + '</td>' +
            '<td>' + telefono + '</td>' +
            '<td>' + direccion + '</td>' +
            '<td> <button class="btn btn-danger" accion="eliminar" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button> </td>' +
            '</tr>';

        $("#nombreReferenciaInput").val("");
        $("#profesionReferenciaInput").val("");
        $("#telReferenciaInput").val("");
        $("#dirReferenciaInput").val("");

    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Parece que nos falta información!'
        })
    }

    $('#referenciasTabla tbody').append(htmlTags);
});
/* Agregar información en la tabla de parientes */
$("#AgregarParentescoBtn").on("click", function () {
    let parentesco = $.trim($("#parentescoSelect").val());
    let nombre = $.trim($("#nombreFamiliarInput").val());
    let fechaNacimiento = $.trim($("#nacimientoFamiliarDate").val());
    let tel = $.trim($("#familiarTel").val());
    let direccion = $.trim($("#direccionFamiliarInput").val());

    let edad = calcularEdad(fechaNacimiento);

    if (parentesco.length > 0 &&
        nombre.length > 0 &&
        fechaNacimiento.length > 0 &&
        tel.length > 0 &&
        direccion.length > 0
    ) {
        var htmlTags = '<tr>' +
            '<td>' + parentesco + '</td>' +
            '<td>' + nombre + '</td>' +
            '<td fechaNacimiento=' + fechaNacimiento + '>' + edad + '</td>' +
            '<td>' + tel + '</td>' +
            '<td>' + direccion + '</td>' +
            '<td> <button class="btn btn-outline-danger" accion="eliminar" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button> </td>' +
            '</tr>';

        $("#parentescoSelect").val("");
        $("#parentescoSelect").val("");
        $("#nombreFamiliarInput").val("");
        $("#familiarTel").val("");
        $("#nacimientoFamiliarDate").val("");
        $("#direccionFamiliarInput").val("");

    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Parece que nos falta información!'
        })
    }

    $('#parentescoTabla tbody').append(htmlTags);
});
/* Agregar información en la tabla de parientes conocidos que trabajan en la empresa */
$("#conocidosTrabajandoBtn").on("click", function () {
    let parentesco = $.trim($("#parentescoInput").val());
    let nombre = $.trim($("#nombreConocidoInput").val());
    let tiempoConocerlo = $.trim($("#tiempoConocerleInput").val());
    let empresa = $.trim($("#empresaLaboraInput").val());


    if (parentesco.length > 0 &&
        nombre.length > 0 &&
        tiempoConocerlo.length > 0 &&
        empresa.length > 0
    ) {
        var htmlTags = '<tr>' +
            '<td>' + nombre + '</td>' +
            '<td>' + parentesco + '</td>' +
            '<td>' + tiempoConocerlo + '</td>' +
            '<td>' + empresa + '</td>' +
            '<td> <button class="btn btn-danger" accion="eliminar" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button> </td>' +
            '</tr>';

        $("#parentescoInput").val("");
        $("#nombreConocidoInput").val("");
        $("#tiempoConocerleInput").val("");
        $("#empresaLaboraInput").val("");

        $('#parentescoConocidosTabla tbody').append(htmlTags);

    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Parece que nos falta información!'
        })
    }


});

// !Eliminar datos de las tablas
// !------------------------------------------------

$("#parentescoTabla tbody").on("click", "td button", function () {
    // Obtener la acción a realizar
    const accion = $(this).attr("accion");
    if (accion == "eliminar") {
        $(this).closest("tr").remove();

    }
});

$("#parentescoConocidosTabla tbody").on("click", "td button", function () {
    // Obtener la acción a realizar
    const accion = $(this).attr("accion");
    if (accion == "eliminar") {
        $(this).closest("tr").remove();

    }
});

$("#educacionTabla tbody").on("click", "td button", function () {
    // Obtener la acción a realizar
    const accion = $(this).attr("accion");
    if (accion == "eliminar") {
        $(this).closest("tr").remove();

    }
});
$("#idiomasTabla tbody").on("click", "td button", function () {
    // Obtener la acción a realizar
    const accion = $(this).attr("accion");
    if (accion == "eliminar") {
        $(this).closest("tr").remove();

    }
});

$("#referenciasTabla tbody").on("click", "td button", function () {
    // Obtener la acción a realizar
    const accion = $(this).attr("accion");
    if (accion == "eliminar") {
        $(this).closest("tr").remove();

    }
});




// !Previsualicación de fotos
// !------------------------------------------------

/* Foto */
$('#archivoInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("fotoImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
/* Id front*/
$('#idfotoFrontInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("idfotoFrontImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
/* Id back*/
$('#idfotoBackInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("idfotoBackImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
/* licencia front*/
$('#licenciaFotoFrontInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("licenciafotoFrontImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
/* licencia back*/
$('#licenciaFotoBackInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("licenciafotoBackImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
/* pasaporte */
$('#pasaporteFotoInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("pasaportefotoImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
/* licencia de moto front*/
$('#licenciaMotoFotoFrontInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("licenciaMotofotoFrontImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
/* licencia de moto back*/
$('#licenciaMotoFotoBackInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("licenciaMotoBackfotoImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});



// !Pasar a la siguiente página.
// !------------------------------------------------

$("#siguienteHfBtn").on("click", function () {
    siguiente("datos-personales", "historial-familiar")
    //$("#siguienteHfBtn").click();

});
$("#anteriorSBtn").on("click", function () {
    siguiente("historial-familiar", "datos-personales")

});

$("#siguienteSBtn").on("click", function () {
    siguiente("historial-familiar", "salud")
});
$("#anteriorEBtn").on("click", function () {
    siguiente("salud", "historial-familiar")
});

$("#siguienteEBtn").on("click", function () {
    siguiente("salud", "educacion")
});
$("#anteriorAlBtn").on("click", function () {
    siguiente("educacion", "salud")
});

$("#siguienteAlBtn").on("click", function () {
    siguiente("educacion", "antecedentes-laborales")
});
$("#anteriorRBtn").on("click", function () {
    siguiente("antecedentes-laborales", "educacion")
});

$("#siguienteRBtn").on("click", function () {
    siguiente("antecedentes-laborales", "referencias")
});
$("#anteriorABtn").on("click", function () {
    siguiente("referencias", "antecedentes-laborales")
});

$("#siguienteABtn").on("click", function () {
    siguiente("referencias", "adjuntos")
});
$("#anteriorBtn").on("click", function () {
    siguiente("adjuntos", "referencias")
});


// !Funciones
// !------------------------------------------------

/* Pasar a la siguiente página */
function siguiente(anterior, siguiente) {
    $("#" + siguiente + "-tab").addClass("active");
    $("#" + anterior + "-tab").removeClass("active");

    $("#" + siguiente).addClass("active");
    $("#" + anterior).removeClass("active");
    $("#" + anterior).addClass("show");
    $("#" + anterior).addClass("show");

    $("#" + siguiente + "-tab").attr('aria-selected', 'true');
    $("#" + anterior + "-tab").attr('aria-selected', 'false');

    $("#" + siguiente + "-tab").removeAttr('tabindex');
    $("#" + anterior + "-tab").attr('tabindex', '-1');


}

/* Calcular edad en base a una fecha */
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

function cargarEmpleado(id) {
    console.log("PROBANDO 1,2,3... AQUI ESTAMOS EN CARGAR EMPLEADO");
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
            console.log("AQUI TENEMOS LA CONSULTA, EL ID ENVIADO ES>", id);
            console.log(respuesta);
            if (respuesta.length > 0) {
                let datos = respuesta[0];
                let penales='./sections/empleado/archivos/antecedentes_penales/'+datos.penales;
                let policiales='./sections/empleado/archivos/antecedentes_policiales/'+datos.policiales;

                $("#idInput").val(datos.DNI).change();
                $("#primerNombreInput").val(datos.primerNombre).change();
                $("#segundoNombreInput").val(datos.segundoNombre).change();
                $("#primerApellidoInput").val(datos.primerApellido).change();
                $("#SegundoApellidoInput").val(datos.segundoApellido).change();
                $("#fechaNacimientoDate").val(datos.fechaNacimiento).change();
                $("#lugarNacimientoInput").val(datos.lugarNacimiento).change();
                $("#nacionalidadInput").val(datos.nacionalidad).change();
                $("#estadoCivilSelect").val(datos.estadoCivil).change();
                $("#telefonoInput").val(datos.telefono).change();
                $("#emailInput").val(datos.email).change();
                $("#generoSelect").val(datos.genero).change();
                $("#cuentaBancoInput").val(datos.cuentaBancaria).change();
                $("#direccion1Input").val(datos.direccion).change();
                $("#direccionInput").val(datos.zona).change();
                $("#latInput").val(datos.latitud).change();
                $("#longInput").val(datos.longitud).change();
                $("#penalesDescargar").attr('href',penales).change();
                $("#policialesDescargar").attr('href',policiales).change();


                if (datos.vencimientoLicencia != '1900-01-01') {
                    console.log(datos.vencimientoLicencia);
                    $("#licenciaCheck").prop("checked", true).change();
                    $("#fechaVenceLicenciaInput").val(datos.vencimientoLicencia);
                    $(".carroDate").show();
                }
                if (datos.vencimientoLicenciaMoto != '1900-01-01') {
                    $("#motoCheck").prop("checked", true).change();
                    $("#fechaVenceMotoInput").val(datos.vencimientoLicenciaMoto);
                    $(".motoDate").show();
                }
                if (datos.vencimientoPasaporte != '1900-01-01') {
                    $("#pasaporteCheck").prop("checked", true).change();
                    $("#fechaVencePasaporteInput").val(datos.vencimientoPasaporte);
                    $(".pasaporteDate").show();
                }

                //*Cargar fotos
                if (datos.foto) {
                    $("#fotoImg").attr("src", "./sections/empleado/archivos/empleado/" + datos.foto);
                }
                if (datos.pasaporte) {
                    $("#pasaportefotoImg").attr("src", "./sections/empleado/archivos/pasaporte/" + datos.pasaporte);
                }
                if (datos.licenciaCarroFront && datos.licenciaCarroBack) {
                    $("#licenciafotoFrontImg").attr("src", "./sections/empleado/archivos/licencia_carro/" + datos.licenciaCarroFront);
                    $("#licenciafotoBackImg").attr("src", "./sections/empleado/archivos/licencia_carro/" + datos.licenciaCarroBack);
                }
                if (datos.licenciaMotoFront && datos.licenciaMotoBack) {
                    $("#licenciaMotofotoFrontImg").attr("src", "./sections/empleado/archivos/licencia_moto/" + datos.licenciaMotoFront);
                    $("#licenciaMotofotoBackImg").attr("src", "./sections/empleado/archivos/licencia_moto/" + datos.licenciaMotoBack);
                }
                if (datos.dniFront && datos.dniBack) {
                    $("#idfotoFrontImg").attr("src", "./sections/empleado/archivos/dni/" + datos.dniFront);
                    $("#idfotoBackImg").attr("src", "./sections/empleado/archivos/dni/" + datos.dniBack);
                }





                //*Cargar la dirección en el mapa y hacerlo arrastable
                $(".no-editable").attr("disabled", true);

                // Crea un marcador y hazlo arrastrable
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
                            var addressTextarea = document.getElementById('direccionInput');
                            addressTextarea.value = data.display_name; // Mostrar la dirección en el cuadro de texto
                        });
                });


                cargarHistoriaFamiliar(id);
                cargaInfoSalud(id);
                cargarConocidos(id);
                cargarEducacion(id);
                cargarIdiomas(id);
                cargarEstudiosActuales(id);
                cargarAntecedentes(id);
                cargarReferencias(id);
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
            console.log("AQUI ESTAMOS EN CARGAR HISTORIAL FAMILIAR Y ESTO ES LO QUE TRAE");
            console.log(respuesta);
            if (respuesta.length > 0) {
                // Selecciona la tabla por su ID
                var tabla = $("#parentescoTabla");


                $.each(respuesta, function (index, registro) {
                    let edad = calcularEdad(registro.fechaNacimiento);
                    // Crea una nueva fila
                    var fila = $("<tr>");
                    fila.append($("<td>").text(registro.parentesco));
                    fila.append($("<td>").text(registro.nombre));
                    fila.append($("<td>").text(edad));
                    fila.append($("<td>").text(registro.telefono));
                    fila.append($("<td>").text(registro.direccion));
                    fila.append($("<td>").html('<button class="btn btn-outline-danger" accion="eliminar" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button>'));


                    // Agrega la fila a la tabla
                    tabla.append(fila);
                });



            } else {
                console.log("NADA! No hay datos en parientes conocidos.!")
            }


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
                let datos = respuesta[0];
                $("#contacto1Input").val(datos.contactoEmergencia1).change();
                $("#contacto2Input").val(datos.contactoEmergencia2).change();
                $("#telEmergencia1Input").val(datos.tel1).change();
                $("#telEmergencia2Input").val(datos.tel2).change();
                $("#tipoSangreSelect").val(datos.tipoSangre).change();
                $("#enfermedadesInput").val(datos.enfermedades).change();
                $("#medicoCabeceraInput").val(datos.medico).change();
                $("#telMedicoInput").val(datos.telMedico).change();
                $("#centroMedicoInput").val(datos.centroMedico).change();



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
            console.log(respuesta);
            if (respuesta.length > 0) {
                // Selecciona la tabla por su ID
                var tabla = $("#educacionTabla");

                $.each(respuesta, function (index, registro) {

                    var fila = $("<tr>");
                    fila.append($("<td>").text(registro.nivel));
                    fila.append($("<td>").text(registro.centroEducativo));
                    fila.append($("<td>").text(registro.estudio));
                    fila.append($("<td>").text(registro.desde));
                    fila.append($("<td>").text(registro.hasta));
                    fila.append($("<td>").text(registro.lugar));
                    fila.append($("<td>").html(' '));
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

                $.each(respuesta, function (index, registro) {

                    var fila = $("<tr>");
                    fila.append($("<td class='text-center'>").text(registro.idioma));
                    fila.append($("<td class='text-center' porcentaje='"+registro.porcentaje+"'>").text(registro.porcentaje));
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
                $("#estudioActualCheck").trigger("click");

                let datos = respuesta[0];
                $("#carreraActualInput").val(datos.carrera).change();
                $("#horarioDesdeInput").val(datos.horaEntrada).change();
                $("#horarioHastaInput").val(datos.horaSalida).change();
                $("#finalizaDate").val(datos.finalizacion).change();

            } else {
                console.log("NO HAY NADA, ¿POR QUE NO HAY NADA? ... QUE BUENA PREGUNTA")
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

