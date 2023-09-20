
/* Esconder controles */
$(".esconder").hide();
$(".esconderEstudios").hide();


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
    } else {
        $(".esconderEstudios").hide();
        $(".esconderEstudios").val("");
    }
});
/* Si tiene parientes conocidos en la empresa */
$("#parientesConocidosCheck").on("click", function () {
    if ($("#parientesConocidosCheck:checked").val()) {
        $(".esconder").show();
    } else {
        $(".esconder").hide();
        $(".esconder").val("");
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
        var htmlTags = '<tr class="aling-items-center">' +
            '<td class="text-center ">' + idioma + '</td>' +
            '<td class="text-center ">' + porcentaje + '%</td>' +
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
            '<td>' + edad + '</td>' +
            '<td>' + tel + '</td>' +
            '<td>' + direccion + '</td>' +
            '<td> <button class="btn btn-outline-danger" accion="eliminar" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button> </td>' +
            '</tr>';

        $("#parentescoSelect").val("");
        $("#parentescoSelect").val("");
        $("#nombreFamiliarInput").val("");
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
    
});
$("#anteriorSBtn").on("click", function () {
    console.log("CLICK");
    siguiente( "historial-familiar","datos-personales")
    
});

$("#siguienteSBtn").on("click", function () {
    siguiente("historial-familiar", "salud")
});
$("#anteriorEBtn").on("click", function () {
    siguiente( "salud","historial-familiar")
});

$("#siguienteEBtn").on("click", function () {
    siguiente("salud", "educacion")
});
$("#anteriorAlBtn").on("click", function () {
    siguiente( "educacion","salud")
});

$("#siguienteAlBtn").on("click", function () {
    siguiente("educacion", "antecedentes-laborales")
});
$("#anteriorRBtn").on("click", function () {
    siguiente( "antecedentes-laborales","educacion")
});

$("#siguienteRBtn").on("click", function () {
    siguiente("antecedentes-laborales", "referencias")
});
$("#anteriorABtn").on("click", function () {
    siguiente( "referencias","antecedentes-laborales")
});

$("#siguienteABtn").on("click", function () {
    siguiente("referencias", "adjuntos")
});
$("#anteriorBtn").on("click", function () {
    siguiente( "adjuntos","referencias")
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
    
    $("#" + siguiente+ "-tab").attr('aria-selected', 'true');
    $("#" + anterior+ "-tab").attr('aria-selected', 'false');

    $("#" + siguiente+ "-tab").removeAttr('tabindex');
    $("#" + anterior+ "-tab").attr('tabindex', '-1');


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

