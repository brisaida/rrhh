// !Este archivo contiene las validaciones que se realizaran al perfil del empleado antes de guardar(dicha del empleado)
var falta = "";



$("#revisarBtn").on("click", function () {

    // *Sección de datos generales
    // *---------------------------------------------------------

    falta = ""
    let foto = $.trim($("#archivoInput").val());
    let id = $.trim($("#idInput").val());
    let primerNombre = $.trim($("#primerNombreInput").val());
    let segundoNombre = $.trim($("#segundoNombreInput").val());
    let primerApellido = $.trim($("#primerApellidoInput").val());
    let segundoApellido = $.trim($("#SegundoApellidoInput").val());
    let fechaNacimiento = $.trim($("#fechaNacimientoDate").val());
    let lugarNacimiento = $.trim($("#lugarNacimientoInput").val());
    let nacionalidad = $.trim($("#nacionalidadInput").val());
    let telefono = $.trim($("#telefonoInput").val());
    let estadoCivil = $.trim($("#estadoCivilSelect").val());
    let genero = $.trim($("#generoSelect").val());
    let cuentaBancaria = $.trim($("#cuentaBancoInput").val());
    let dirección = $.trim($("#direccionInput").val());
    let lat = $.trim($("#latInput").val());
    let long = $.trim($("#longInput").val());
    let pasaporte;
    let licenciaCarro;
    let licenciaMoto;

    if ($("#pasaporteCheck:checked").val()) {
        pasaporte = $("#fechaVencePasaporteInput").val();
        pasaporteFoto = $("#pasaporteFotoInput").val();
    }
    if ($("#licenciaCheck:checked").val()) {
        licenciaCarro = $("#fechaVenceLicenciaInput").val();
        licenciaCarroFoto1 = $("#licenciaFotoFrontInput").val();
        licenciaCarroFoto2 = $("#licenciaFotoBackInput").val();
    }
    if ($("#motoCheck:checked").val()) {
        licenciaMoto = $("#fechaVenceMotoInput").val();
        licenciaMotoFoto1 = $("#licenciaMotoFotoFrontInput").val();
        licenciaMotoFoto2 = $("#licenciaMotoFotoBackInput").val();
    }

    if (!foto) { falta += " - Foto" }
    if (!id) { falta += " - No. de identidad" }
    if (!primerNombre) { falta += " - Primer Nombre" }
    if (!primerApellido) { falta += " - Primer Apellido" }
    if (!fechaNacimiento) { falta += " - Fecha de Nacimiento" }
    if (!lugarNacimiento) { falta += " - Lugar de Nacimiento" }
    if (!nacionalidad) { falta += " - Nacionalidad" }
    if (!telefono) { falta += " - telefono" }
    if (!estadoCivil) { falta += " - Estado Civil" }
    if (!genero) { falta += " - Género" }
    if (!cuentaBancaria) { falta += " - Cuenta Bancaria" }
    if (!dirección) { falta += " - Dirección" }
    if (!lat || !long) { falta += " - La ubicación de tu casa en el mapa" }

    // En el caso de los siguientes campos al ser opcionales solo les agrega el N/A
    if (!segundoNombre) { $("#segundoNombreInput").val("N/A") }
    if (!segundoApellido) { $("#SegundoApellidoInput").val("N/A") }


    if ($("#pasaporteCheck:checked").val()) {
        if (!pasaporte) { falta += " - Fecha de vencimiento de pasaporte" }
        if (!pasaporteFoto) { falta += " - Foto de Pasaporte" }
    }
    if ($("#licenciaCheck:checked").val()) {
        if (!licenciaCarro) { falta += " - Fecha de Vencimiento de la licencia de vehiculo" }
        if (!licenciaCarroFoto1) { falta += " - Foto de Licencia Vehículo" }
        if (!licenciaCarroFoto2) { falta += " - Foto de Licencia Vehículo" }
    }
    if ($("#motoCheck:checked").val()) {
        if (!licenciaMoto) { falta += " - Fecha de vencimiento de la licencia de motocicleta" }
        if (!licenciaMotoFoto1) { falta += " - Foto de Licencia Motocicleta" }
        if (!licenciaMotoFoto2) { falta += " - Foto de Licencia Motocicleta" }
    }



    // *Sección de historial familiar
    // *---------------------------------------------------------
    var filas = $('#parentescoTabla tr');
    var cantidadFilas = filas.length - 1;
    if (cantidadFilas == 0) {
        falta += " - Información del historial familiar";
    }
    if ($("#parientesConocidosCheck:checked").val()) {
        var tablafilas = $('#parentescoConocidosTabla tr');
        var noFilas = tablafilas.length - 1;
        if (noFilas == 0) { falta += " - Información de conocidos trabajando en la empresa" }
    }


    // *Sección de Salud
    // *---------------------------------------------------------
    let emergenia1 = $.trim($("#contacto1Input").val());
    let tel1 = $.trim($("#telEmergencia1Input").val());
    let emergencia2 = $.trim($("#contacto2Input").val());
    let tel2 = $.trim($("#telEmergencia12Input").val());
    let tiposangre = $.trim($("#tipoSangreSelect").val());
    let enfermedades = $.trim($("#enfermedadesInput").val());
    let medico = $.trim($("#medicoCabeceraInput").val());
    let telMedico = $.trim($("#telMedicoInput").val());
    let centroMedico = $.trim($("#centroMedicoInput").val());


    if (!emergenia1 || !emergencia2) { falta += " - Contacto de emergencia" }
    if (!tel1 || tel2) { falta += " - Teléfono del contacto de emergenia" }
    if (!tiposangre) { falta += " - Tipo de Sangre" }
    // En el caso de los siguientes campos al ser opcionales solo les agrega el N/A
    if (!enfermedades) { $("#enfermedadesInput").val("N/A") }
    if (!medico) { $("#medicoCabeceraInput").val("N/A") }
    if (!telMedico) { $("#telMedicoInput").val("N/A") }
    if (!centroMedico) { $("#centroMedicoInput").val("N/A") }



    // *Sección de Educación
    // *---------------------------------------------------------

    let carrera = "";
    let desde = "";
    let hasta = "";
    let fechaFinalizacion = "";

    var filasEdu = $('#educacionTabla tr');
    var cantidadFilasEdu = filasEdu.length - 1;
    if (cantidadFilasEdu == 0) {
        falta += " - Información Acádemica, al menos 2";
    }
    if ($("#estudioActualCheck:checked").val()) {
        carrera = $.trim($("#carreraInput").val());
        desde = $.trim($("#horarioDesdeInput").val());
        hasta = $.trim($("#horarioHastaInput").val());
        fechaFinalizacion = $.trim($("#telEmergencia12Input").val());

        if (!carrera) { falta += " - Carrera o diploma que estudia actualmente " }
        if (!desde || !hasta) { falta += " - Horario de estudio" }
        if (!fechaFinalizacion) { falta += " - Finalización del estudio actual." }
    }


    // *Sección de Educación
    // *---------------------------------------------------------
    let empresa = $.trim($("#nombreEmpresaInput").val());
    let tipoEmpresa = $.trim($("#tipoEmpresaInput").val());
    let direccionEmpresa = $.trim($("#dirEmpresaInput").val());
    let telEmpresa = $.trim($("#telEmpresaInput").val());
    let ultimoPuesto = $.trim($("#ultimoPuestoInput").val());
    let nombreJefe = $.trim($("#jefeInmediatoInput").val());
    let telJefe = $.trim($("#telJefeInput").val());
    let fechAIngreso = $.trim($("#ingresoDate").val());
    let fechaDeRetiro = $.trim($("#retiroDate").val());
    let sueldoInicial = $.trim($("#sueldoInicialNumber").val());
    let sueldoFinal = $.trim($("#sueldoFinalNumber").val());
    let causaRetiro = $.trim($("#causaRetiroInput").val());
    let descripcionPuesto = $.trim($("#descripcionPuestoInput").val());
    let empresa2 = $.trim($("#nombreEmpresaInput2").val());
    let tipoEmpresa2 = $.trim($("#tipoEmpresaInput2").val());
    let direccionEmpresa2 = $.trim($("#dirEmpresaInput2").val());
    let telEmpresa2 = $.trim($("#telEmpresaInput2").val());
    let ultimoPuesto2 = $.trim($("#ultimoPuestoInput2").val());
    let nombreJefe2 = $.trim($("#jefeInmediatoInput2").val());
    let telJefe2 = $.trim($("#telJefeInput2").val());
    let fechAIngreso2 = $.trim($("#ingresoDate2").val());
    let fechaDeRetiro2 = $.trim($("#retiroDate2").val());
    let sueldoInicial2 = $.trim($("#sueldoInicialNumber2").val());
    let sueldoFinal2 = $.trim($("#sueldoFinalNumber2").val());
    let causaRetiro2 = $.trim($("#causaRetiroInput2").val());
    let descripcionPuesto2 = $.trim($("#descripcionPuestoInput2").val());

    if (!empresa || !empresa2) { falta += " - Nombre de la empresa anterior" }
    if (!tipoEmpresa || !tipoEmpresa2) { falta += " - Tipo de la empresa anterior" }
    if (!direccionEmpresa || !direccionEmpresa2) { falta += " - Dirección de la empresa anterior" }
    if (!telEmpresa || !telEmpresa2) { falta += " - Teléfono de la empresa anterior" }
    if (!ultimoPuesto || !ultimoPuesto2) { falta += " - Último puesto desempeñado de la empresa anterior" }
    if (!nombreJefe || !nombreJefe2) { falta += " - Nombre dedel jefe anterior" }
    if (!telJefe || !telJefe2) { falta += " - Teléfono jefe anterior" }
    if (!fechaDeRetiro || !fechaDeRetiro2) { falta += " - Fecha de ingreso a la empresa anterior" }
    if (!fechAIngreso || !fechAIngreso2) { falta += " - Fecha de egresoa de la empresa anterior" }
    if (!sueldoInicial || !sueldoInicial2) { falta += " - Sueldo inicial en la empresa anterior" }
    if (!sueldoFinal || !sueldoFinal2) { falta += " - Sueldo final en la empresa anterior" }
    if (!causaRetiro || !causaRetiro2) { falta += " - Causas de retiro de la empresa anterior" }
    if (!descripcionPuesto || !descripcionPuesto2) { falta += " - Descripcion del puesto en la empresa anterior" }



    // *Sección de Referencias
    // *---------------------------------------------------------

    var filasRef = $('#referenciasTabla tr');
    var cantidadFilasRef = filasRef.length - 1;
    if (cantidadFilasRef > 2) {
        falta += " - Faltan referencias personales, al menos 2";
    }


    // *Sección de Adjuntos
    // *---------------------------------------------------------
    let idCv = $.trim($("#cvInput").val());
    let idFront = $.trim($("#idfotoFrontInput").val());
    let idBack = $.trim($("#idfotoBacktInput").val());
    let penales = $.trim($("#penalesFotoInput").val());
    let policiales = $.trim($("#policialesFotoInput").val());

    if (!idCv) { falta += " - Curriculum" }
    if (!idFront || !idBack) { falta += " - Foto de Identidad" }
    if (!penales) { falta += " - Antecentes Penales" }
    if (!policiales) { falta += " - Antecedentes Policiales" }

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






});