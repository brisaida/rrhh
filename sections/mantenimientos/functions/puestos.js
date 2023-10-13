$(document).ready(function(){
    listarProyectos(); 
}); 

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
				title: "Empleados",
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
                                        <option class="text-end" data-id='${registro.id}'>${registro.nombre}</option>
								    `;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('.proyecto').append(contenido);
				});

			} 
		},
	});
}
