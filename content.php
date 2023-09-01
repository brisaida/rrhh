<!-- Programación de redirección a cada módulo -->
<?php


if (empty($_GET['section'])) {
    include "./sections/inicio.php";
} else {
    $_GET['section'] == 'listadoEmpleados' ? include "./sections/empleado/view/listadoEmpleados.php" : false;
    $_GET['section'] == 'empleado' ? include "./sections/empleado/view/empleado.php" : false;
    $_GET['section'] == 'perfilPuesto' ? include "./sections/empleado/view/perfilPuesto.php" : false;
    $_GET['section'] == 'historialEmpleados' ? include "./sections/empleado/view/historialEmpleados.php" : false;
    $_GET['section'] == 'configuracion' ? include "./sections/config.php" : false;
}




?>