var usuario=1;
$(document).ready(function(){
    listarProyectos(); 
});


// *Botón guardar
$("#directoresBTN").click(function(){

	let puesto = $.trim($("#nombrePuesto").val());
	let proyecto = $("#directorSelect").find("option:selected").data("id");

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
	let origen = $("#nivel3").find("option:selected").data("origen");

	var datos = {
        puesto: puesto,
        proyecto: proyecto,
        dependencia: dependencia,
        origen: origen,
        usuario: usuario,
    }
	agregarGerentes(datos);
}); 
$("#especialistasBTN").click(function(){

	let puesto = $.trim($("#nombrePuestoN4").val());
	let proyecto = $("#especialistaSelect").find("option:selected").data("id");
	let dependencia = $("#nivel4").find("option:selected").data("id");
	let origen = $("#nivel4").find("option:selected").data("origen");

	var datos = {
        puesto: puesto,
        proyecto: proyecto,
        dependencia: dependencia,
        origen: origen,
        usuario: usuario,
    }
	agregarEspecialistas(datos);
});
$("#tecnicosBTN").click(function(){

	let puesto = $.trim($("#nombrePuestoN5").val());
	let proyecto = $("#tecnicoSelect").find("option:selected").data("id");
	let dependencia = $("#nivel5").find("option:selected").data("id");
	let origen = $("#nivel5").find("option:selected").data("origen");

	var datos = {
        puesto: puesto,
        proyecto: proyecto,
        dependencia: dependencia,
        origen: origen,
        usuario: usuario,
    }
	agregarTecnicos(datos);
});


// *Poner dependencias de acuerdo a al proyecto
$("#proyectosSelect").change(function(){
    var selectedOption = $(this).find("option:selected");
    var dataId = selectedOption.data("id");
    
    listarPuestosPorProyectos(dataId);
});
$("#gerenciaSelect").change(function(){
    var selectedOption = $(this).find("option:selected");
    var dataId = selectedOption.data("id");
    
    listarPuestosParaGerente(dataId);
});
$("#adminSelect").change(function(){
    var selectedOption = $(this).find("option:selected");
    var dataId = selectedOption.data("id");
    
    listarPuestosPorProyectos(dataId);
});
$("#especialistaSelect").change(function(){
    var selectedOption = $(this).find("option:selected");
    var dataId = selectedOption.data("id");
    
    listarPuestosParaEspecialistas(dataId);
});
$("#tecnicoSelect").change(function(){
    var selectedOption = $(this).find("option:selected");
    var dataId = selectedOption.data("id");
    
    listarPuestosParaTecnicos(dataId);
});


// *Funciones para agregar puestos
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
				title: 'Agregado Exitosamente',
				text: "¿Continuar agregando más puestos de trabajo?",
				showDenyButton: true,
				confirmButtonText: 'Continuar Agregando',
				denyButtonText: `No gracias`,
			  }).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					window.location.href = '?section=puestos';
				} else if (result.isDenied) {
					window.location.href = '?section=verPuestos';
				}
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
				title: 'Agregado Exitosamente',
				text: "¿Continuar agregando más puestos de trabajo?",
				showDenyButton: true,
				confirmButtonText: 'Continuar Agregando',
				denyButtonText: `No gracias`,
			  }).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					window.location.href = '?section=puestos';
				} else if (result.isDenied) {
					window.location.href = '?section=verPuestos';
				}
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
				title: 'Agregado Exitosamente',
				text: "¿Continuar agregando más puestos de trabajo?",
				showDenyButton: true,
				confirmButtonText: 'Continuar Agregando',
				denyButtonText: `No gracias`,
			  }).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					window.location.href = '?section=puestos';
				} else if (result.isDenied) {
					window.location.href = '?section=verPuestos';
				}
			  })

        },
    });
}
function agregarEspecialistas(especialistas) {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/agregarEspecialistas.php",
        data: {
            especialistas: especialistas,
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
				title: 'Agregado Exitosamente',
				text: "¿Continuar agregando más puestos de trabajo?",
				showDenyButton: true,
				confirmButtonText: 'Continuar Agregando',
				denyButtonText: `No gracias`,
			  }).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					window.location.href = '?section=puestos';
				} else if (result.isDenied) {
					window.location.href = '?section=verPuestos';
				}
			  })

        },
    });
}
function agregarTecnicos(tecnicos) {
    $.ajax({
        type: "POST",
        url: "./sections/mantenimientos/controller/agregarTecnicos.php",
        data: {
            tecnicos: tecnicos,
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
				title: 'Agregado Exitosamente',
				text: "¿Continuar agregando más puestos de trabajo?",
				showDenyButton: true,
				confirmButtonText: 'Continuar Agregando',
				denyButtonText: `No gracias`,
			  }).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					window.location.href = '?section=puestos';
				} else if (result.isDenied) {
					window.location.href = '?section=verPuestos';
				}
			  })

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

// *Listas puestos de trabajo dependiendo del proyecto
function listarPuestosPorProyectos(id) {
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
			$('#adminLevel,#DirectoresSelect').html('');
			$('#adminLevel,#DirectoresSelect').html('<option></option>');
			if (respuesta.length > 0) {
				
				$.each(respuesta, function (index, registro) {
					var contenido = `
                                        <option data-id='${registro.idDirector}'>${registro.puesto}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#adminLevel,#DirectoresSelect').append(contenido);
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
                                        <option data-id='${registro.id}' data-origen='${registro.Origen}'>${registro.puesto}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#nivel3').append(contenido);
				});

			} 
		},
	});
}
function listarPuestosParaEspecialistas(id) {
	$.ajax({
		type: "POST",
		url: "./sections/mantenimientos/controller/listarPuestosParaEspecialistas.php",
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
			$('#nivel4').html('');
			$('#nivel4').html('<option></option>');
			if (respuesta.length > 0) {
				
				$.each(respuesta, function (index, registro) {
					var contenido = `
                                        <option data-id='${registro.id}' data-origen='${registro.Origen}'>${registro.puesto}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#nivel4').append(contenido);
				});

			} 
		},
	});
}
function listarPuestosParaTecnicos(id) {
	$.ajax({
		type: "POST",
		url: "./sections/mantenimientos/controller/listarPuestosParaTecnicos.php",
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
			$('#nivel5').html('');
			$('#nivel5').html('<option></option>');
			if (respuesta.length > 0) {
				
				$.each(respuesta, function (index, registro) {
					var contenido = `
                                        <option data-id='${registro.id}' data-origen='${registro.Origen}'>${registro.puesto}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#nivel5').append(contenido);
				});

			} 
		},
	});
}

