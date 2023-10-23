
// *Cuando el documento esta cargado
$(document).ready(function () {

    const location = window.location.search;
    const elementos = location.split("&");

    idRegistro = parseInt(elementos[1]);
    cargarEmpleado(elementos[1]);
    cargarZonas();
    listarProyectos();
	cargarEmpleados();


	$('#TDRSelect, #proyectos, #jefeInmediato').select2({
		minimumResultsForSearch: 0
	  });
});

$("#proyectos").change(function(){
    var selectedOption = $(this).find("option:selected");
    var dataId = selectedOption.data("id");
    
    listarPuestosPorProyectos(dataId);
});


$("#guardarBtn").change(function(){
    var historial = {
        idEmpleado: $.trim($("#noIdentidad").data("id")),
        codigoEmpleado: $.trim($("#codigoEmpleadoInput").val()),
        codigoSAP: $.trim($("#codigoSAPInput").val()),
        inicio: $.trim($("#inicioDate").val()),
        retiro: $.trim($("#retiroInput").val()),
        zona: $.trim($("#zonaSelect").val()),
        sitio: $.trim($("#sitio").val()),
        salario: $.trim($("#salarioInput").val()),
        vacaciones: $.trim($("#vacaciones").val()),
        TelefonoEmpresa: $.trim($("#TelefonoEmpresa").val()),
        proyectos: $.trim($("#proyectos").val()),
        puesto: $.trim($("#TDRSelect").val()),
        jefeInmediato: $.trim($("#jefeInmediato").val()),
    }

});



// *Funciones
// *-----------------------------------------------------------------------
// *Cargar la información del empleado que vamos a agregar el historial
function cargarEmpleado(id) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/buscarInfoEmpleado.php",
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
            let datos = respuesta[0];
            $("#noIdentidad").attr("data-id",datos.idEmpleado);
            $("#noIdentidad").val(datos.DNI);
            $("#nombreInput").val(datos.nombreCompleto);
        },
    });
}
// *Carga todos los empleados en el select
function cargarEmpleados() {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/cargarEmpleados.php",
        data: {
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
				$("#jefeInmediato").html('');
				$("#jefeInmediato").html("<option>Seleccione</option>");
				$.each(respuesta, function (index, registro) {
					var contenido = `
                                        <option data-id='${registro.idEmpleado}'>${capitalizar(registro.nombreCompleto)}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#jefeInmediato').append(contenido);
				});

			} 
        },
    });
}
function cargarZonas() {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/historial/cargarZonas.php",
        data: {
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
				$("#zonaSelect").html('');
				$("#zonaSelect").html("<option>Seleccione</option>");
				$.each(respuesta, function (index, registro) {
					var contenido = `
                                        <option data-id='${registro.idDepartamento}'>${capitalizar(registro.descripcion)}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#zonaSelect').append(contenido);
				});

			} 
        },
    });
}
//* Listar todos los proyectos en los select
function listarProyectos() {
	$.ajax({
		type: "POST",
		url: "./sections/mantenimientos/controller/listarProyectos.php",
		data: {
		},
		dataType: "json",
		// Error en la petición
		error: function (error) {
			console.log(error);
			Swal.fire({
				title: "Puestos de trabajo",
				icon: "error",
				text: `Error`,
				confirmButtonColor: "#3085d6",
			});
		},
		success: function (respuesta) {
			if (respuesta.length > 0) {
                $(".proyecto").html('');
				$(".proyecto").html("<option>Seleccione</option>");
				$.each(respuesta, function (index, registro) {
					var contenido = `
                                        <option data-id='${registro.id}'>${registro.nombre}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('.proyecto').append(contenido);
				});

			} 
		},
	});
}

function listarPuestosPorProyectos(id) {
	$.ajax({
		type: "POST",
		url: "./sections/mantenimientos/controller/listarPuestosTodosPorProyecto.php",
		data: {
            id: id,
		},
		dataType: "json",
		// Error en la petición
		error: function (error) {
			console.log(error);
			Swal.fire({
				title: "Puestos de trabajo",
				icon: "error",
				text: `Error`,
				confirmButtonColor: "#3085d6",
			});
		},
		success: function (respuesta) {
			$('#TDRSelect').html('');
			$('#TDRSelect').html('<option>Seleccione</option>');
			if (respuesta.length > 0) {
				
				$.each(respuesta, function (index, registro) {
					var contenido = `
                                        <option data-id='${registro.id}'>${registro.puesto}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#TDRSelect').append(contenido);
				});

			} 
		},
	});
}


function capitalizar(name) {
    return name.split(' ').map(function(word) {
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    }).join(' ');
}
