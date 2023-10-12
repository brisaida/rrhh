$(document).ready(function () {
	$(".admin").hide();
	cargarCumples();
});

function cargarCumples() {
	$.ajax({
		type: "POST",
		url: "./sections/home/controller/listarCumples.php",
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
									<div class="item p-3 align-items-center">
										<div class="row gx-2 justify-content-between align-items-center">
											<div class="col-auto align-items-center">
												<img class="profile-image" src="./assets/images/birthday-cake.png" alt="">
											</div>
											<div class="col align-items-center">
												<p>Celebremos el cumpleaños de ${capitalizarNombre(registro.nombreCompleto)}</p> 
											</div>
										</div>
									</div>
								`;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#espacioNotificacion').append(contenido);
				});





			} else {
				$("#numeroNorificaciones").hide();
				var contenido = `
									<div class="item p-3 align-items-center">
										<div class="row gx-2 justify-content-between align-items-center">
										
											<div class="col align-items-center text-center">
											<img class="profile-image" src="./assets/images/cheque.png" alt="">
												<p class="m-2">SIN NOTIFICACIONES
												</p>

											</div>
										</div><!--//row-->
									</div><!--//item-->
								`;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#espacioNotificacion').append(contenido);
				console.log("No hay cumpleañeros")
			}


		},
	});
}



function capitalizarNombre(nombre) {
	return nombre
	  .toLowerCase()  // Convertir todo a minúsculas
	  .split(' ')     // Dividir el nombre en palabras
	  .map(function(word) {
		return word.charAt(0).toUpperCase() + word.slice(1);
	  })              // Capitalizar la primera letra de cada palabra
	  .join(' ');      // Unir las palabras nuevamente
  }
