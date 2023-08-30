<!-- Programación de redirección a cada módulo -->
<?php


if (empty($_GET['section'])) {
    include "./sections/inicio.php";
} else {
    $_GET['section'] == 'listadoEmpleados' ? include "./sections/empleado/listadoEmpleados.php" : false;
    $_GET['section'] == 'empleado' ? include "./sections/empleado/empleado.php" : false;
    $_GET['section'] == 'perfilEmpleado' ? include "./sections/empleado/perfilEmpleado.php" : false;
}




?>