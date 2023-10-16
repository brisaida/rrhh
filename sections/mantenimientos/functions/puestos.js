$(document).ready(function(){
    listarProyectos(); 
});

$("#directoresBTN").click(function(){

	let puesto = $.trim($("#nombrePuesto").val());
	let proyecto = $("#directorSelect").find("option:selected").data("id");

	var director = {
        puesto: puesto,
        proyecto: proyecto,
    }
	agregarDirector(director);
}); 

function agregarDirector(directores) {
    $.ajax({
        type: "POST",
        url: "./sections/empleado/controller/agregarEmpleado.php",
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

           /* setTimeout(function () {
                window.location.href = '?section=completado';
            }, 1500);  */

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
