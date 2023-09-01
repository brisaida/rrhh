	<!-- Javascript -->
	<script src="./assets/plugins/popper.min.js"></script>
	<script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>


	<!-- Charts JS -->


	<!-- jquery -->
	<script src="./assets/js/jquery-3.7.1.min.js"></script>

	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


	<!-- Enable tooltips -->
	<script>
	    $(document).ready(function() {
	        $('.js-example-basic-multiple').select2();
	    });

	    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
	    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
	</script>

	<?php


    if (!empty($_GET['section'])) {


        if ($_GET['section'] == 'inicio') {
            //echo '<script src="./sections/home/js/inicio.js"></script>';

        } else if ($_GET['section'] == 'empleado' || $_GET['section'] == 'empleado') {
            echo '<script src="./assets/js/sections/perfilEmpleado.js"></script>';
        } else if ($_GET['section'] == 'perfilPuesto' || $_GET['section'] == 'perfilPuesto') {
            echo '<script src="./assets/js/sections/perfilPuesto.js"></script>';
        } else if ($_GET['section'] == 'historialEmpleado' || $_GET['section'] == 'historialEmpleado') {
            echo '<script src="./assets/js/sections/historialEmpleado.js"></script>';
        } else if ($_GET['section'] == 'historialEmpleado' || $_GET['section'] == 'historialEmpleado') {
            echo '<script src="./assets/js/sections/config.js"></script>';
        }
    } else {
        echo '<script src="./sections/home/js/inicio.js"></script>';
    }
    ?>