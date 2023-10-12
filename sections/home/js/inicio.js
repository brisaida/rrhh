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
			$("#numeroNorificaciones").text(respuesta.length);
			console.log(respuesta.length);
			if (respuesta.length > 0) {

				$.each(respuesta, function (index, registro) {
					var contenido = `
									<div class="item p-3 align-items-center">
										<div class="row gx-2 justify-content-between align-items-center">
											<div class="col-auto align-items-center">
												<img class="profile-image" src="./assets/images/birthday-cake.png" alt="">
											</div><!--//col-->
											<div class="col align-items-center">
												<p>Celebremos el cumpleaños de ${capitalizarNombre(registro.nombreCompleto)}</p> 
											</div><!--//col-->
										</div><!--//row-->
										<a class="link-mask" href="notifications.html"></a>
									</div><!--//item-->
								`;

					// Agregar el contenido al div 'espacioNotificaciones'
					$('#espacioNotificacion').append(contenido);
				});





			} else {
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
