
/* Esconder controles */

$(".esconder").hide();
$(".esconderEstudios").hide();

/* Mostrar información si tiene pasaporte */
$("#pasaporteCheck").on("click", function () {
    if ($("#pasaporteCheck:checked").val()) {
        $(".pasaporteDate").show();
    } else {
        $(".pasaporteDate").hide();
        $(".pasaporteDate").val("");
    }
});
/* Mostrar información si tiene licencia de vehiculo */
$("#licenciaCheck").on("click", function () {
    if ($("#licenciaCheck:checked").val()) {
        $(".carroDate").show();
    } else {
        $(".carroDate").hide();
        $(".carroDate").val("");
    }
});
/* Mostrar información si tiene licencia de moto */
$("#motoCheck").on("click", function () {
    if ($("#motoCheck:checked").val()) {
        $(".motoDate").show();
        console.log("hola");
    } else {
        $(".motoDate").hide();
        $(".motoDate").val("");
    }
});


/* Mostrar información si estudia */
$("#estudioActualCheck").on("click", function () {
    if ($("#estudioActualCheck:checked").val()) {
        $(".esconderEstudios").show();
    } else {
        $(".esconderEstudios").hide();
        $(".esconderEstudios").val("");
    }
});

/* Mostrar información si tiene parientes conocidos en la empresa */
$("#parientesConocidosCheck").on("click", function () {
    if ($("#parientesConocidosCheck:checked").val()) {
        $(".esconder").show();
    } else {
        $(".esconder").hide();
        $(".esconder").val("");
    }
});

/* Agregar información en la tabla educación} */
$("#agregarEducacion").on("click", function () {
    let nivel = $.trim($("#nivelEducativoSelect").val());
    let centro = $.trim($("#centroEducativoInput").val());
    let de = $.trim($("#desdeNumber").val());
    let hasta = $.trim($("#hastaNumber").val());
    let lugar = $.trim($("#lugarInput").val());


    if (nivel.length > 0 &&
        centro.length > 0 &&
        de.length > 0 &&
        hasta.length > 0 &&
        lugar.length > 0
    ) {
        var htmlTags = '<tr>' +
            '<td>' + nivel + '</td>' +
            '<td>' + centro + '</td>' +
            '<td>' + de + '</td>' +
            '<td>' + hasta + '</td>' +
            '<td>' + lugar + '</td>' +
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
            '<td>' + profesion + '</td>' +
            '<td>' + nombre + '</td>' +
            '<td>' + telefono + '</td>' +
            '<td>' + direccion + '</td>' +
            '</tr>';

        $("#profesionSelect").val("");
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
    let direccion = $.trim($("#direccionFamiliarInput").val());

    let edad = calcularEdad(fechaNacimiento);

    if (parentesco.length > 0 &&
        nombre.length > 0 &&
        fechaNacimiento.length > 0 &&
        direccion.length > 0
    ) {
        var htmlTags = '<tr>' +
            '<td>' + parentesco + '</td>' +
            '<td>' + nombre + '</td>' +
            '<td>' + edad + '</td>' +
            '<td>' + direccion + '</td>' +
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
$("#agregarConocidosBtn").on("click", function () {
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
            '<td>' + parentesco + '</td>' +
            '<td>' + nombre + '</td>' +
            '<td>' + tiempoConocerlo + '</td>' +
            '<td>' + empresa + '</td>' +
            '</tr>';

        $("#parentescoInput").val("");
        $("#nombreConocidoInput").val("");
        $("#tiempoConocerleInput").val("");
        $("#empresaLaboraInput").val("");

    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Parece que nos falta información!'
        })
    }



    $('#parentescoTabla tbody').append(htmlTags);
});

/* Previsualizar Foto */
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

/* Previsualizar id */
$('#idFotoInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("idfotoImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});

/* Previsualizar licencia */
$('#licenciaFotoInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("licenciafotoImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
/* Previsualizar pasaporte */
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
/* Previsualizar licencia de moto */
$('#licenciaMotoFotoInput').change(function (e) {

    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("licenciaMotofotoImg").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});


$("#siguienteHfBtn").on("click",function(){
    siguiente("datos-personales","historial-familiar")
});

$("#siguienteSBtn").on("click",function(){
   siguiente("historial-familiar","salud")
});

$("#siguienteEBtn").on("click",function(){
    siguiente("salud","educacion")
 });

 $("#siguienteAlBtn").on("click",function(){
    siguiente("educacion","antecedentes-laborales")
 });

 $("#siguienteRBtn").on("click",function(){
    siguiente("antecedentes-laborales","referencias")
 });

 $("#siguienteABtn").on("click",function(){
    siguiente("referencias","adjuntos")
 });






function siguiente(anterior, siguiente){
    $("#"+siguiente+"-tab").addClass("active");
    $("#"+anterior+"-tab").removeClass("active");
    $("#"+siguiente).addClass("active");
    $("#"+anterior).removeClass("active");
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

