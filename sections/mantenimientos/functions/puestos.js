var usuario=1;
$(document).ready(function(){
    listarProyectos(); 
});

$("#directoresBTN").click(function(){

	let puesto = $.trim($("#nombrePuesto").val());
	let proyecto = $("#adminSelect").find("option:selected").data("id");

	var director = {
        puesto: puesto,
        proyecto: proyecto,
        usuario: usuario,
    }
	agregarDirector(director);
}); 
$("#adminBTN").click(function(){

	let puesto = $.trim($("#nombrePuestoAdmin").val());
	let proyecto = $("#adminSelect").find("option:selected").data("id");
	let dependencia = $("#adminLevel").find("option:selected").data("id");

	var admin = {
        puesto: puesto,
        proyecto: proyecto,
        dependencia: dependencia,
        usuario: usuario,
    }
	agregarAdmin(admin);
}); 

$("#gerentesBTN").click(function(){

	let puesto = $.trim($("#nombrePuestoN3").val());
	let proyecto = $("#gerenciaSelect").find("option:selected").data("id");
	let dependencia = $("#nivel3").find("option:selected").data("id");

	var admin = {
        puesto: puesto,
        proyecto: proyecto,
        dependencia: dependencia,
        usuario: usuario,
    }
	agregarGerentes(admin);
}); 

$("#gerenciaSelect").change(function(){
    var selectedOption = $(this).find("option:selected");
    var dataId = selectedOption.data("id");
    
    listarPuestosParaGerente(dataId);
});
$("#adminSelect").change(function(){
    var selectedOption = $(this).find("option:selected");
    var dataId = selectedOption.data("id");
    
    listarPuestosPorProyectos("adminLevel",dataId);
});

function agregarDirector(directores) {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/agregarDirector.php",
        data: {
            directores: directores,
        },
        error: function (error) {
            Swal.fire({
                title: "Puestos de trabajo",
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

        },
    });
}
function agregarAdmin(admin) {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/agregarAdministrativo.php",
        data: {
            admin: admin,
        },
        error: function (error) {
            Swal.fire({
                title: "Puestos de trabajo",
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

        },
    });
}
function agregarGerentes(gerentes) {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/agregarGerentes.php",
        data: {
            gerentes: gerentes,
        },
        error: function (error) {
            Swal.fire({
                title: "Puestos de trabajo",
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

        },
    });
}

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
				$("#numeroNorificaciones").text(respuesta.length);
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

function listarPuestosPorProyectos(nombreSelect,id) {
	$.ajax({
		type: "POST",
		url: "./sections/mantenimientos/controller/listarPuestosPorProyectos.php",
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
			$('#'+nombreSelect).html('');
			$('#'+nombreSelect).html('<option></option>');
			if (respuesta.length > 0) {
				
				$.each(respuesta, function (index, registro) {
					var contenido = `
                                        <option data-id='${registro.idDirector}'>${registro.puesto}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#'+nombreSelect).append(contenido);
				});

			} 
		},
	});
}
function listarPuestosParaGerente(id) {
	$.ajax({
		type: "POST",
		url: "./sections/mantenimientos/controller/listarPuestosParaGerentes.php",
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
			$('#nivel3').html('');
			$('#nivel3').html('<option></option>');
			if (respuesta.length > 0) {
				
				$.each(respuesta, function (index, registro) {
					var contenido = `
                                        <option data-id='${registro.id}'>${registro.puesto}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#nivel3').append(contenido);
				});

			} 
		},
	});
}
