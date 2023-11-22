	<!-- Javascript -->
	<script src="./assets/plugins/popper.min.js"></script>
	<script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>




    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script> 
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 


	<!-- jquery -->
	<script src="./assets/js/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<!-- Moment js -->
	<script src="./assets/js/moment.js"></script>



	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>




	<!-- Incluye DataTables.js -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

	<!-- Impresión del mapa -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

	



	<!-- Enable tooltips -->
	<script>
		$(document).ready(function() {
			$('.js-example-basic-multiple').select2();
		});

		const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
		const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
	</script>

	<script src="./sections/home/js/inicio.js"></script>


	<?php


	if (!empty($_GET['section'])) {


		if ($_GET['section'] == 'inicio') {
			//echo '<script src="./sections/home/js/inicio.js"></script>';


			/* Empleado */
		} else if ($_GET['section'] == 'empleado' || $_GET['section'] == 'empleado') {
			echo '<script src="./sections/empleado/functions/perfilEmpleado.js"></script>';
			echo '<script src="./sections/empleado/functions/maps.js"></script>';
			echo '<script src="./sections/empleado/functions/validacionesPerfil.js"></script>';
		} else if ($_GET['section'] == 'editarAdjuntos' || $_GET['section'] == 'editarAdjuntos') {
			echo '<script src="./sections/empleado/functions/editarAdjuntos.js"></script>';
		} else if ($_GET['section'] == 'editar' || $_GET['section'] == 'editar') {
			echo '<script src="./sections/empleado/functions/editar.js"></script>';
			echo '<script src="./sections/empleado/functions/mapsEdit.js"></script>';
		} else if ($_GET['section'] == 'listadoEmpleados' || $_GET['section'] == 'listadoEmpleados') {
			echo '<script src="./sections/empleado/functions/listadoEmpleados.js"></script>';
		} else if ($_GET['section'] == 'perfilPuesto' || $_GET['section'] == 'perfilPuesto') {
			echo '<script src="./sections/empleado/functions/perfilPuesto.js"></script>';
		} else if ($_GET['section'] == 'historialEmpleados' || $_GET['section'] == 'historialEmpleado') {
			echo '<script src="./sections/empleado/functions/historial.js"></script>';
		}

		/*Acción de personal */
		else if ($_GET['section'] == 'solicitudAccion' || $_GET['section'] == 'solicitudAccion') {
			echo '<script src="./sections/accionPersonal/functions/solicitudAccion.js"></script>';
		}
		else if ($_GET['section'] == 'estadoSolicitud' || $_GET['section'] == 'estadoSolicitud') {
			echo '<script src="./sections/accionPersonal/functions/listadoSolicitudes.js"></script>';
		}
		else if ($_GET['section'] == 'aprobarSolicitudes' || $_GET['section'] == 'aprobarSolicitudes') {
			echo '<script src="./sections/accionPersonal/functions/solicitudesPorAprobar.js"></script>';
		}
		else if ($_GET['section'] == 'visorSolicitudes' || $_GET['section'] == 'visorSolicitudes') {
			echo '<script src="./sections/accionPersonal/functions/visorSolicitudes.js"></script>';
		}

		/* Mantenimientos */ 
		else if ($_GET['section'] == 'historialEmpleado' || $_GET['section'] == 'historialEmpleado') {
			echo '<script src="./sections/empleado/functions/config.js"></script>';
		} else if ($_GET['section'] == 'profesion' || $_GET['section'] == 'profesion') {
			echo '<script src="./sections/empleado/functions/profesion.js"></script>';
		} else if ($_GET['section'] == 'tipoAccion' || $_GET['section'] == 'tipoAccion') {
			echo '<script src="./sections/mantenimientos/functions/tipoAccionPersonal.js"></script>';
		} else if ($_GET['section'] == 'puestos' || $_GET['section'] == 'puestos') {
			echo '<script src="./sections/mantenimientos/functions/puestos.js"></script>';
		} else if ($_GET['section'] == 'verPuestos' || $_GET['section'] == 'verPuestos') {
			echo'<script src="https://d3js.org/d3.v7.min.js"></script>';
			echo '<script src="./sections/mantenimientos/functions/puestos.js"></script>';
			echo '<script src="./sections/mantenimientos/functions/listadoPuestos.js"></script>';
		}
	} else {
	}
	?>