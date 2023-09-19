// !Este archivo contiene las validaciones que se realizaran al perfil del empleado antes de guardar(dicha del empleado)

var falta = "";

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
        foto: foto,
        id: $.trim($("#idInput").val()),
        primerNombre: $.trim($("#primerNombreInput").val()),
        segundoNombre: $.trim($("#segundoNombreInput").val()),
        primerApellido: $.trim($("#primerApellidoInput").val()),
        segundoApellido: $.trim($("#SegundoApellidoInput").val()),
        fechaNacimiento: $.trim($("#fechaNacimientoDate").val()),
        lugarNacimiento: $.trim($("#lugarNacimientoInput").val()),
        nacionalidad: $.trim($("#nacionalidadInput").val()),
        telefono: $.trim($("#telefonoInput").val()),
        estadoCivil: $.trim($("#estadoCivilSelect").val()),
        genero: $.trim($("#generoSelect").val()),
        cuentaBancaria: $.trim($("#cuentaBancoInput").val()),
        dirección: $.trim($("#direccionInput").val()),
        lat: $.trim($("#latInput").val()),
        long: $.trim($("#longInput").val()),
        pasaporte: pasaporte,
        licenciaCarro: licenciaCarro,
        licenciaCarroFoto1: licenciaCarroFoto1,
        licenciaCarroFoto2: licenciaCarroFoto2,
        licenciaMoto: licenciaMoto,
        licenciaMotoFoto1: licenciaMotoFoto1,
        licenciaMotoFoto2: licenciaMotoFoto2,
        pasaporteFoto: pasaporteFoto,
    }


    if (!datosGenerales.foto) { falta += " - Foto" }
    if (!datosGenerales.id) { falta += " - No. de identidad" }
    if (!datosGenerales.primerNombre) { falta += " - Primer Nombre" }
    if (!datosGenerales.primerApellido) { falta += " - Primer Apellido" }
    if (!datosGenerales.fechaNacimiento) { falta += " - Fecha de Nacimiento" }
    if (!datosGenerales.lugarNacimiento) { falta += " - Lugar de Nacimiento" }
    if (!datosGenerales.nacionalidad) { falta += " - Nacionalidad" }
    if (!datosGenerales.telefono) { falta += " - telefono" }
    if (!datosGenerales.estadoCivil) { falta += " - Estado Civil" }
    if (!datosGenerales.genero) { falta += " - Género" }
    if (!datosGenerales.cuentaBancaria) { falta += " - Cuenta Bancaria" }
    if (!datosGenerales.dirección) { falta += " - Dirección" }
    if (!datosGenerales.lat || !datosGenerales.long) { falta += " - La ubicación de tu casa en el mapa" }

    // En el caso de los siguientes campos al ser opcionales solo les agrega el N/A
    if (!datosGenerales.segundoNombre) { $("#segundoNombreInput").val("N/A") }
    if (!datosGenerales.segundoApellido) { $("#SegundoApellidoInput").val("N/A") }


    if ($("#pasaporteCheck:checked").val()) {
        if (!datosGenerales.pasaporte) { falta += " - Fecha de vencimiento de pasaporte" }
        if (!datosGenerales.pasaporteFoto) { falta += " - Foto de Pasaporte" }
    }
    if ($("#licenciaCheck:checked").val()) {
        if (!datosGenerales.licenciaCarro) { falta += " - Fecha de Vencimiento de la licencia de vehiculo" }
        if (!datosGenerales.licenciaCarroFoto1 || !datosGenerales.licenciaCarroFoto2) { falta += " - Foto de Licencia Vehículo" }
    }
    if ($("#motoCheck:checked").val()) {
        if (!datosGenerales.licenciaMoto) { falta += " - Fecha de vencimiento de la licencia de motocicleta" }
        if (!datosGenerales.licenciaMotoFoto1 || !datosGenerales.licenciaMotoFoto2) { falta += " - Foto de Licencia Motocicleta" }
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
        registro.fechaNacimiento = fila.find('td:eq(2)').text();
        registro.direccion = fila.find('td:eq(3)').text();

        // Agrega el registro al arreglo "parentesco"
        parentesco.push(registro);
    });


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
        emergenia1: $.trim($("#contacto1Input").val()),
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



    if ($("#estudioActualCheck:checked").val()) {

        var estudiosActuales = {
            carrera: $.trim($("#carreraInput").val()),
            desde: $.trim($("#horarioDesdeInput").val()),
            hasta: $.trim($("#horarioHastaInput").val()),
            fechaFinalizacion: $.trim($("#finalizaDate").val()),
        }


        if (!estudiosActuales.carrera) { falta += " - Carrera o diploma que estudia actualmente " }
        if (!estudiosActuales.desde || !estudiosActuales.hasta) { falta += " - Horario de estudio" }
        if (!estudiosActuales.fechaFinalizacion) { falta += " - Finalización del estudio actual." }


    }


    // *Sección de Historial laboral
    // *---------------------------------------------------------
    var historialLaboral = {
        empresa: $.trim($("#nombreEmpresaInput").val()),
        tipoEmpresa: $.trim($("#tipoEmpresaInput").val()),
        direccionEmpresa: $.trim($("#dirEmpresaInput").val()),
        telEmpresa: $.trim($("#telEmpresaInput").val()),
        ultimoPuesto: $.trim($("#ultimoPuestoInput").val()),
        nombreJefe: $.trim($("#jefeInmediatoInput").val()),
        telJefe: $.trim($("#telJefeInput").val()),
        fechAIngreso: $.trim($("#ingresoDate").val()),
        fechaDeRetiro: $.trim($("#retiroDate").val()),
        sueldoInicial: $.trim($("#sueldoInicialNumber").val()),
        sueldoFinal: $.trim($("#sueldoFinalNumber").val()),
        causaRetiro: $.trim($("#causaRetiroInput").val()),
        descripcionPuesto: $.trim($("#descripcionPuestoInput").val()),
        empresa2: $.trim($("#nombreEmpresaInput2").val()),
        tipoEmpresa2: $.trim($("#tipoEmpresaInput2").val()),
        direccionEmpresa2: $.trim($("#dirEmpresaInput2").val()),
        telEmpresa2: $.trim($("#telEmpresaInput2").val()),
        ultimoPuesto2: $.trim($("#ultimoPuestoInput2").val()),
        nombreJefe2: $.trim($("#jefeInmediatoInput2").val()),
        telJefe2: $.trim($("#telJefeInput2").val()),
        fechAIngreso2: $.trim($("#ingresoDate2").val()),
        fechaDeRetiro2: $.trim($("#retiroDate2").val()),
        sueldoInicial2: $.trim($("#sueldoInicialNumber2").val()),
        sueldoFinal2: $.trim($("#sueldoFinalNumber2").val()),
        causaRetiro2: $.trim($("#causaRetiroInput2").val()),
        descripcionPuesto2: $.trim($("#descripcionPuestoInput2").val())

    }

    if (!historialLaboral.empresa || !historialLaboral.empresa2) { falta += " - Nombre de la empresa anterior" }
    if (!historialLaboral.tipoEmpresa || !historialLaboral.tipoEmpresa2) { falta += " - Tipo de la empresa anterior" }
    if (!historialLaboral.direccionEmpresa || !historialLaboral.direccionEmpresa2) { falta += " - Dirección de la empresa anterior" }
    if (!historialLaboral.telEmpresa || !historialLaboral.telEmpresa2) { falta += " - Teléfono de la empresa anterior" }
    if (!historialLaboral.ultimoPuesto || !historialLaboral.ultimoPuesto2) { falta += " - Último puesto desempeñado de la empresa anterior" }
    if (!historialLaboral.nombreJefe || !historialLaboral.nombreJefe2) { falta += " - Nombre dedel jefe anterior" }
    if (!historialLaboral.telJefe || !historialLaboral.telJefe2) { falta += " - Teléfono jefe anterior" }
    if (!historialLaboral.fechaDeRetiro || !historialLaboral.fechaDeRetiro2) { falta += " - Fecha de ingreso a la empresa anterior" }
    if (!historialLaboral.fechAIngreso || !historialLaboral.fechAIngreso2) { falta += " - Fecha de egresoa de la empresa anterior" }
    if (!historialLaboral.sueldoInicial || !historialLaboral.sueldoInicial2) { falta += " - Sueldo inicial en la empresa anterior" }
    if (!historialLaboral.sueldoFinal || !historialLaboral.sueldoFinal2) { falta += " - Sueldo final en la empresa anterior" }
    if (!historialLaboral.causaRetiro || !historialLaboral.causaRetiro2) { falta += " - Causas de retiro de la empresa anterior" }
    if (!historialLaboral.descripcionPuesto || !historialLaboral.descripcionPuesto2) { falta += " - Descripcion del puesto en la empresa anterior" }



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


    var adjunto = {
        idCv: cv1,
        idFront: id1,
        idBack: id2,
        penales: penalesFoto,
        policiales: policialesFoto,
    }


    if (!adjunto.idCv) { falta += " - Curriculum" }
    if (!adjunto.idFront || !adjunto.idBack) { falta += " - Foto de Identidad" }
    if (!adjunto.penales) { falta += " - Antecentes Penales" }
    if (!adjunto.policiales) { falta += " - Antecedentes Policiales" }

    // * Modal en caso de faltar información
    // *---------------------------------------------------------
    console.log(falta);
    if (falta) {
        Swal.fire({
            icon: 'error',
            title: 'Oops... Parece que falta información',
            text: falta
        })
    }


    console.log(datosGenerales);
    console.log(parentesco);
    console.log(parentescoConocidos);
    console.log(salud);
    console.log(educacion);
    console.log(estudiosActuales);
    console.log(historialLaboral);
    console.log(referencias);
    console.log(adjunto);


});