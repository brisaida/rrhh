<!-- Programación de redirección a cada módulo -->
<?php


if (empty($_GET['section'])) {
    include "./sections/inicio.php";
} else {
    $_GET['section'] == 'listadoEmpleados' ? include "./sections/empleado/view/listadoEmpleados.php" : false;
    $_GET['section'] == 'empleado' ? include "./sections/empleado/view/empleado.php" : false;
    $_GET['section'] == 'perfilPuesto' ? include "./sections/empleado/view/perfilPuesto.php" : false;
    $_GET['section'] == 'historialEmpleados' ? include "./sections/empleado/view/historialEmpleados.php" : false;
    $_GET['section'] == 'completado' ? include "./sections/empleado/view/completado.php" : false;
    $_GET['section'] == 'fichaEmpleado' ? include "./sections/empleado/reports/pdf/fichaEmpleado.php" : false;
    $_GET['section'] == 'autorizacionBancaria' ? include "./sections/empleado/reports/pdf/permisoBanco.php" : false;


    /* Mantenimientos */
    $_GET['section'] == 'configuracion' ? include "./sections/config.php" : false;
    $_GET['section'] == 'profesion' ? include "./sections/mantenimientos/view/profesion.php" : false;
    $_GET['section'] == 'tipoAccion' ? include "./sections/mantenimientos/view/accionesPersonal.php" : false;
    $_GET['section'] == 'proyectos' ? include "./sections/mantenimientos/view/proyectos.php" : false;
    $_GET['section'] == 'condicionTrabajo' ? include "./sections/mantenimientos/view/condicionesTrabajo.php" : false;
    $_GET['section'] == 'remuneraciones' ? include "./sections/mantenimientos/view/remuneraciones.php" : false;


    /* Accion de personal */
    $_GET['section'] == 'solicitudAccion' ? include "./sections/accionPersonal/views/solicitudAccion.php" : false;
    $_GET['section'] == 'estadoSolicitud' ? include "./sections/accionPersonal/views/estadoSolicitud.php" : false;


    /* Seguro Médico */
    $_GET['section'] == 'docs' ? include "./sections/seguro/views/docs.php" : false;
}




?>