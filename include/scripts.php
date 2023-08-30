	<!-- Javascript -->
	<script src="./assets/plugins/popper.min.js"></script>
	<script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Charts JS -->
	<script src="./assets/plugins/chart.js/chart.min.js"></script>
	<script src="./assets/js/index-charts.js"></script>

	<!-- Page Specific JS -->
	<script src="./assets/js/app.js"></script>

	<!-- OWN JS -->
	<script src="./assets/js/app.js"></script>


	<!-- jquery -->
	<script src="./assets/js/jquery-3.7.1.min.js"></script>

	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



	<?php


    if (!empty($_GET['section'])) {

     
        if($_GET['section']=='inicio'){
            //echo '<script src="./sections/home/js/inicio.js"></script>';

        }

         else if($_GET['section'] == 'empleado' || $_GET['section']=='empleado'){
            echo '<script src="./assets/js/sections/perfilEmpleado.js"></script>';
        }
         else if($_GET['section'] == 'perfilPuesto' || $_GET['section']=='perfilPuesto'){
            echo '<script src="./assets/js/sections/perfilPuesto.js"></script>';
        }


        



    }else{
        echo '<script src="./sections/home/js/inicio.js"></script>';
    }
?>