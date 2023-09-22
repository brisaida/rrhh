// !Este archivo contiene las validaciones que se realizaran al perfil del empleado antes de guardar(dicha del empleado)

var falta = "";
var usuario=1; 
var conocidos=0; 
var actual=0; 
var usuario=1; 
var usuario=1; 

$("#revisarBtn").on("click", function () {

    // *Sección de datos generales
    // *---------------------------------------------------------

    falta = ""
    let pasaporte = "";
    let pasaporteFoto = "";
    let licenciaCarro = "";
    let licenciaCarroFoto1 = "";
    let licenciaCarroFoto2 = "";
    let licenciaMoto = "";
    let licenciaMotoFoto1 = "";
    let licenciaMotoFoto2 = "";

    const fotoEmpleado = document.querySelector("#archivoInput");
    const foto = fotoEmpleado.files;

    const fotoPasaporte = document.querySelector("#pasaporteFotoInput");
    const fotoPass = fotoPasaporte.files;

    const fotoLicencia1 = document.querySelector("#licenciaFotoFrontInput");
    const foto1 = fotoLicencia1.files;

    const fotoLicencia2 = document.querySelector("#licenciaFotoBackInput");
    const foto2 = fotoLicencia2.files;

    const fotoMoto1 = document.querySelector("#licenciaMotoFotoFrontInput");
    const moto1 = fotoMoto1.files;

    const fotoMoto2 = document.querySelector("#licenciaMotoFotoBackInput");
    const moto2 = fotoMoto2.files;


    if ($("#pasaporteCheck:checked").val()) {
        pasaporte = $("#fechaVencePasaporteInput").val();
        pasaporteFoto = fotoPass;
    }else{
        pasaporte
    }
    if ($("#licenciaCheck:checked").val()) {
        licenciaCarro = $("#fechaVenceLicenciaInput").val();
        licenciaCarroFoto1 = foto1;
        licenciaCarroFoto2 = foto2;
    }
    if ($("#motoCheck:checked").val()) {
        licenciaMoto = $("#fechaVenceMotoInput").val();
        licenciaMotoFoto1 = moto1;
        licenciaMotoFoto2 = moto2;
    }

    var datosGenerales = {
        id: $.trim($("#idInput").val()),
        primerNombre: $.trim($("#primerNombreInput").val()),
        segundoNombre: $.trim($("#segundoNombreInput").val()),
        primerApellido: $.trim($("#primerApellidoInput").val()),
        segundoApellido: $.trim($("#SegundoApellidoInput").val()),
        fechaNacimiento: $.trim($("#fechaNacimientoDate").val()),
        lugarNacimiento: $.trim($("#lugarNacimientoInput").val()),
        nacionalidad: $.trim($("#nacionalidadInput").val()),
        telefono: $.trim($("#telefonoInput").val()),
        email: $.trim($("#emailInput").val()),
        estadoCivil: $.trim($("#estadoCivilSelect").val()),
        genero: $.trim($("#generoSelect").val()),
        cuentaBancaria: $.trim($("#cuentaBancoInput").val()),
        direccion: $.trim($("#direccionInput").val()),
        lat: $.trim($("#latInput").val()),
        long: $.trim($("#longInput").val()),
        pasaporte: pasaporte,
        licenciaCarro: licenciaCarro,
        licenciaMoto: licenciaMoto,
        usuario: usuario,
    }


    if (!foto) { falta += " - Foto" }
    if (!datosGenerales.id) { falta += " - No. de identidad" }
    if (!datosGenerales.primerNombre) { falta += " - Primer Nombre" }
    if (!datosGenerales.primerApellido) { falta += " - Primer Apellido" }
    if (!datosGenerales.fechaNacimiento) { falta += " - Fecha de Nacimiento" }
    if (!datosGenerales.lugarNacimiento) { falta += " - Lugar de Nacimiento" }
    if (!datosGenerales.nacionalidad) { falta += " - Nacionalidad" }
    if (!datosGenerales.telefono) { falta += " - telefono" }
    if (!datosGenerales.email) { falta += " - Correo Electronico" }
    if (!datosGenerales.estadoCivil) { falta += " - Estado Civil" }
    if (!datosGenerales.genero) { falta += " - Género" }
    if (!datosGenerales.cuentaBancaria) { falta += " - Cuenta Bancaria" }
    if (!datosGenerales.direccion) { falta += " - Dirección" }
    if (!datosGenerales.lat || !datosGenerales.long) { falta += " - La ubicación de tu casa en el mapa" }

    // En el caso de los siguientes campos al ser opcionales solo les agrega el N/A
    if (!datosGenerales.segundoNombre) { $("#segundoNombreInput").val("N/A") }
    if (!datosGenerales.segundoApellido) { $("#SegundoApellidoInput").val("N/A") }


    if ($("#pasaporteCheck:checked").val()) {
        if (!datosGenerales.pasaporte) { falta += " - Fecha de vencimiento de pasaporte" }
        if (!pasaporteFoto) { falta += " - Foto de Pasaporte" }
    }
    if ($("#licenciaCheck:checked").val()) {
        if (!datosGenerales.licenciaCarro) { falta += " - Fecha de Vencimiento de la licencia de vehiculo" }
        if (!licenciaCarroFoto1 || !licenciaCarroFoto2) { falta += " - Foto de Licencia Vehículo" }
    }
    if ($("#motoCheck:checked").val()) {
        if (!datosGenerales.licenciaMoto) { falta += " - Fecha de vencimiento de la licencia de motocicleta" }
        if (!licenciaMotoFoto1 || !licenciaMotoFoto2) { falta += " - Foto de Licencia Motocicleta" }
    }



    // *Sección de historial familiar
    // *---------------------------------------------------------
    var filas = $('#parentescoTabla tr');
    var cantidadFilas = filas.length - 1;
    if (cantidadFilas == 0) {
        falta += " - Información del historial familiar";
    }

    var parentesco = [];

    $('#parentescoTabla tbody tr').each(function () {
        var fila = $(this);
        var registro = {};

        // Obtiene los valores de las celdas y los almacena en el arreglo
        registro.parentesco = fila.find('td:eq(0)').text();
        registro.nombreCompleto = fila.find('td:eq(1)').text();
        registro.fechaNacimiento = fila.find('td:eq(2)').attr('fechaNacimiento');
        registro.telefono = fila.find('td:eq(3)').text();
        registro.direccion = fila.find('td:eq(4)').text();

        // Agrega el registro al arreglo "parentesco"
        parentesco.push(registro);
    });

    conocidos=$("#parientesConocidosCheck").attr("conocidos");
    if ($("#parientesConocidosCheck:checked").val()) {
        
        var tablafilas = $('#parentescoConocidosTabla tr');
        var noFilas = tablafilas.length - 1;
        if (noFilas == 0) { falta += " - Información de conocidos trabajando en la empresa" }

        var parentescoConocidos = [];

        $('#parentescoConocidosTabla tbody tr').each(function () {
            var fila = $(this);
            var registro = {};

            // Obtiene los valores de las celdas y los almacena en el arreglo
            registro.nombre = fila.find('td:eq(0)').text();
            registro.parentesco = fila.find('td:eq(1)').text();
            registro.tiempoConocerle = fila.find('td:eq(2)').text();
            registro.empresa = fila.find('td:eq(3)').text();

            // Agrega el registro al arreglo "parentesco"
            parentescoConocidos.push(registro);
        });

    }



    // *Sección de Salud
    // *---------------------------------------------------------

    var salud = {
        emergencia1: $.trim($("#contacto1Input").val()),
        tel1: $.trim($("#telEmergencia1Input").val()),
        emergencia2: $.trim($("#contacto2Input").val()),
        tel2: $.trim($("#telEmergencia2Input").val()),
        tiposangre: $.trim($("#tipoSangreSelect").val()),
        enfermedades: $.trim($("#enfermedadesInput").val()),
        medico: $.trim($("#medicoCabeceraInput").val()),
        telMedico: $.trim($("#telMedicoInput").val()),
        centroMedico: $.trim($("#centroMedicoInput").val()),
    }

    if (!salud.emergenia1 || !salud.emergencia2) { falta += " - Contacto de emergencia" }
    if (!salud.tel1 || !salud.tel2) { falta += " - Teléfono del contacto de emergenia" }
    if (!salud.tiposangre) { falta += " - Tipo de Sangre" }
    // En el caso de los siguientes campos al ser opcionales solo les agrega el N/A
    if (!salud.enfermedades) { $("#enfermedadesInput").val("N/A"); salud.enfermedades = "n/a"; }
    if (!salud.medico) { $("#medicoCabeceraInput").val("N/A"); salud.medico = "n/a"; }
    if (!salud.telMedico) { $("#telMedicoInput").val("N/A"); salud.telMedico = "n/a"; }
    if (!salud.centroMedico) { $("#centroMedicoInput").val("N/A"); salud.centroMedico = "n/a"; }






    // *Sección de Educación
    // *---------------------------------------------------------

    var filasEdu = $('#educacionTabla tr');
    var cantidadFilasEdu = filasEdu.length - 1;
    if (cantidadFilasEdu == 0) {
        falta += " - Información Acádemica, al menos 2";
    }

    var educacion = [];

    $('#educacionTabla tbody tr').each(function () {
        var fila = $(this);
        var registro = {};

        // Obtiene los valores de las celdas y los almacena en el arreglo
        registro.nivel = fila.find('td:eq(0)').text();
        registro.centroEducativo = fila.find('td:eq(1)').text();
        registro.estudios = fila.find('td:eq(2)').text();
        registro.desde = fila.find('td:eq(3)').text();
        registro.hasta = fila.find('td:eq(4)').text();
        registro.lugar = fila.find('td:eq(5)').text();

        // Agrega el registro al arreglo "parentesco"
        educacion.push(registro);
    });

    var filasIdiomas = $('#idiomasTabla tr');
    var cantidadFilasIdiomas = filasIdiomas.length - 1;
    if (cantidadFilasIdiomas == 0) {
        falta += " - Información sobre los idiomas";
    }

    var idiomas = [];

    $('#idiomasTabla tbody tr').each(function () {
        var fila = $(this);
        var registro = {};

        // Obtiene los valores de las celdas y los almacena en el arreglo
        registro.idioma = fila.find('td:eq(0)').text();
        registro.porcentaje = fila.find('td:eq(1)').attr("porcentaje");

        // Agrega el registro al arreglo "parentesco"
        idiomas.push(registro);
    });


    actual=$("#estudioActualCheck").attr("actual");
    if ($("#estudioActualCheck:checked").val()) {

        var estudiosActuales = {
            carrera: $.trim($("#carreraActualInput").val()),
            desde: $.trim($("#horarioDesdeInput").val()),
            hasta: $.trim($("#horarioHastaInput").val()),
            fechaFinalizacion: $.trim($("#finalizaDate").val()),
        }
        console.log($("#carreraActualInput").val());

        if (!estudiosActuales.carrera) { falta += " - Carrera o diploma que estudia actualmente " }
        if (!estudiosActuales.desde || !estudiosActuales.hasta) { falta += " - Horario de estudio" }
        if (!estudiosActuales.fechaFinalizacion) { falta += " - Finalización del estudio actual." }


    }


    // *Sección de Historial laboral
    // *---------------------------------------------------------

    var historial = [];
    
    if (!$.trim($("#nombreEmpresaInput").val()) || !$.trim($("#nombreEmpresaInput2").val())) { falta += " - Nombre de la empresa anterior" }
    if (!$.trim($("#tipoEmpresaInput").val()) || !$.trim($("#tipoEmpresaInput").val())) { falta += " - Tipo de la empresa anterior" }
    if (!$.trim($("#dirEmpresaInput").val()) || !$.trim($("#dirEmpresaInput").val())) { falta += " - Dirección de la empresa anterior" }
    if (!$.trim($("#telEmpresaInput").val()) || !$.trim($("#telEmpresaInput").val())) { falta += " - Teléfono de la empresa anterior" }
    if (!$.trim($("#ultimoPuestoInput").val())|| !$.trim($("#ultimoPuestoInput").val())) { falta += " - Último puesto desempeñado de la empresa anterior" }
    if (!$.trim($("#jefeInmediatoInput").val()) || !$.trim($("#jefeInmediatoInput").val())) { falta += " - Nombre dedel jefe anterior" }
    if (!$.trim($("#telJefeInput").val()) || !$.trim($("#telJefeInput").val())) { falta += " - Teléfono jefe anterior" }
    if (!$.trim($("#ingresoDate").val()) || !$.trim($("#ingresoDate").val())) { falta += " - Fecha de ingreso a la empresa anterior" }
    if (!$.trim($("#retiroDate").val()) || !$.trim($("#retiroDate").val())) { falta += " - Fecha de egreso de la empresa anterior" }
    if (!$.trim($("#sueldoInicialNumber").val()) || !$.trim($("#sueldoInicialNumber").val())) { falta += " - Sueldo inicial en la empresa anterior" }
    if (!$.trim($("#sueldoFinalNumber").val()) || !$.trim($("#sueldoFinalNumber").val())) { falta += " - Sueldo final en la empresa anterior" }
    if (!$.trim($("#causaRetiroInput").val()) || !$.trim($("#causaRetiroInput").val())) { falta += " - Causas de retiro de la empresa anterior" }
    if (!$.trim($("#descripcionPuestoInput").val()) || !$.trim($("#descripcionPuestoInput").val())) { falta += " - Descripcion del puesto en la empresa anterior" }


    var historialLaboral = {
        empresa: $.trim($("#nombreEmpresaInput").val()),
        tipoEmpresa: $.trim($("#tipoEmpresaInput").val()),
        direccionEmpresa: $.trim($("#dirEmpresaInput").val()),
        telEmpresa: $.trim($("#telEmpresaInput").val()),
        ultimoPuesto: $.trim($("#ultimoPuestoInput").val()),
        nombreJefe: $.trim($("#jefeInmediatoInput").val()),
        telJefe: $.trim($("#telJefeInput").val()),
        fechaIngreso: $.trim($("#ingresoDate").val()),
        fechaDeRetiro: $.trim($("#retiroDate").val()),
        sueldoInicial: $.trim($("#sueldoInicialNumber").val()),
        sueldoFinal: $.trim($("#sueldoFinalNumber").val()),
        causaRetiro: $.trim($("#causaRetiroInput").val()),
        descripcionPuesto: $.trim($("#descripcionPuestoInput").val()),
        
    }
    historial.push(historialLaboral);
    historialLaboral={
        empresa: $.trim($("#nombreEmpresaInput2").val()),
        tipoEmpresa: $.trim($("#tipoEmpresaInput2").val()),
        direccionEmpresa: $.trim($("#dirEmpresaInput2").val()),
        telEmpresa: $.trim($("#telEmpresaInput2").val()),
        ultimoPuesto: $.trim($("#ultimoPuestoInput2").val()),
        nombreJefe: $.trim($("#jefeInmediatoInput2").val()),
        telJefe: $.trim($("#telJefeInput2").val()),
        fechaIngreso: $.trim($("#ingresoDate2").val()),
        fechaDeRetiro: $.trim($("#retiroDate2").val()),
        sueldoInicial: $.trim($("#sueldoInicialNumber2").val()),
        sueldoFinal: $.trim($("#sueldoFinalNumber2").val()),
        causaRetiro: $.trim($("#causaRetiroInput2").val()),
        descripcionPuesto: $.trim($("#descripcionPuestoInput2").val())

    }
    historial.push(historialLaboral);
   


    // *Sección de Referencias
    // *---------------------------------------------------------

    var filasRef = $('#referenciasTabla tr');
    var cantidadFilasRef = filasRef.length - 1;
    if (cantidadFilasRef > 2) {
        falta += " - Faltan referencias personales, al menos 2";
    }
    var referencias = [];

    $('#referenciasTabla tbody tr').each(function () {
        var fila = $(this);
        var registro = {};

        // Obtiene los valores de las celdas y los almacena en el arreglo
        registro.nombre = fila.find('td:eq(0)').text();
        registro.profesion = fila.find('td:eq(1)').text();
        registro.telefono = fila.find('td:eq(2)').text();
        registro.direccion = fila.find('td:eq(3)').text();
        // Agrega el registro al arreglo "parentesco"
        referencias.push(registro);
    });


    // *Sección de Adjuntos
    // *---------------------------------------------------------

    const cv = document.querySelector("#cvInput");
    const cv1 = cv.files;
    const dn1 = document.querySelector("#idfotoFrontInput");
    const id1 = dn1.files;
    const dn2 = document.querySelector("#idfotoBackInput");
    const id2 = dn2.files;
    const penales = document.querySelector("#penalesFotoInput");
    const penalesFoto = penales.files;
    const policiales = document.querySelector("#policialesFotoInput");
    const policialesFoto = policiales.files;


    

    if (!cv1) { falta += " - Curriculum" }
    if (!id1 || !id2) { falta += " - Foto de Identidad" }
    if (!penalesFoto) { falta += " - Antecentes Penales" }
    if (!policialesFoto) { falta += " - Antecedentes Policiales" }

    // * Modal en caso de faltar información
    // *---------------------------------------------------------

    /* if (falta) {
        Swal.fire({
            icon: 'error',
            title: 'Oops... Parece que falta información',
            text: falta
        })
    } else { */
       AgregarEmpleado(datosGenerales, parentesco, parentescoConocidos,salud,educacion,estudiosActuales,historial,referencias,idiomas,conocidos,actual);
    /* } */


    /* console.log(datosGenerales);
    console.log(parentesco);
    console.log(parentescoConocidos);
    console.log(salud);
    console.log(educacion);
    console.log(estudiosActuales);
    console.log(historialLaboral);
    console.log(referencias);; */


});


// *Funciones 
// *---------------------------------------------------------


function subirFoto(archivos, idRegistro, nombreControlador) {
    var formData = new FormData();

    for (const archivo of archivos) {
        formData.append("archivos[]", archivo);
    }

    formData.append("idRegistro", idRegistro);

    // Realizamos petición
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/" + nombreControlador + ".php",
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        // Error en la petición
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Foto del productor",
                icon: "error",
                text: `${error.responseText}`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            // console.log("convenio", respuesta);

        },
    });
}

function AgregarEmpleado(datosGenerales, parentesco, parentescoConocidos,salud,educacion,estudiosActuales,historialLaboral,referencias,idiomas,conocidos,actual) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/agregarEmpleado.php",
        data: {
            datosGenerales: datosGenerales,
            parentesco: parentesco, 
            parentescoConocidos: parentescoConocidos,
            salud: salud,
            educacion: educacion,
            estudiosActuales: estudiosActuales,
            historialLaboral: historialLaboral,
            referencias: referencias,
            idiomas: idiomas,
            conocidos: conocidos,
            actual: actual,
        },
        error: function (error) {
            console.log(error);
            Swal.fire({
                title: "Ficha del empelado",
                icon: "error",
                text: `${error.responseText}`,
                confirmButtonColor: "#3085d6",
            });
        },
        success: function (respuesta) {
            

        },
    });
}


