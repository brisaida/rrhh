<!-- Programación de redirección a cada módulo -->
<?php

# Dirección validada
include_once('./config/Connection.php');
include_once('./sections/usuarios/model/usuarios.php');
$permisos = new mdlUsuario();

if (empty($_GET['section'])) {
    include "./sections/inicio.php";
} else {
    /* Empleados */
    $_GET['section'] == 'listadoEmpleados' && $permisos->validarPermiso('listadoEmpleados') ? include "./sections/empleado/view/listadoEmpleados.php" : false;
    $_GET['section'] == 'empleado' && $permisos->validarPermiso('empleado')  ?  include "./sections/empleado/view/empleado.php" : false;
    $_GET['section'] == 'editar' && $permisos->validarPermiso('editar')  ?  include "./sections/empleado/view/empleadoEdit.php" : false;
    $_GET['section'] == 'editarAdjuntos' && $permisos->validarPermiso('editarAdjuntos')  ?  include "./sections/empleado/view/adjuntosEdit.php" : false;
    $_GET['section'] == 'perfilPuesto' && $permisos->validarPermiso('perfilPuesto')  ?  include "./sections/empleado/view/perfilPuesto.php" : false;
    $_GET['section'] == 'historialEmpleados' && $permisos->validarPermiso('historialEmpleados')  ?  include "./sections/empleado/view/historialEmpleados.php" : false;
    $_GET['section'] == 'completado' && $permisos->validarPermiso('completado')  ?  include "./sections/empleado/view/completado.php" : false;
    $_GET['section'] == 'fichaEmpleado' && $permisos->validarPermiso('fichaEmpleado')  ?  include "./sections/empleado/reports/pdf/fichaEmpleado.php" : false;
    $_GET['section'] == 'autorizacionBancaria' && $permisos->validarPermiso('autorizacionBancaria')  ?  include "./sections/empleado/reports/pdf/permisoBanco.php" : false;


    /* Mantenimientos */
    $_GET['section'] == 'configuracion' && $permisos->validarPermiso('configuracion')  ?  include "./sections/config.php" : false;
    $_GET['section'] == 'profesion' && $permisos->validarPermiso('profesion')  ?  include "./sections/mantenimientos/view/profesion.php" : false;
    $_GET['section'] == 'puestos' && $permisos->validarPermiso('puestos')  ?  include "./sections/mantenimientos/view/puestos.php" : false;
    $_GET['section'] == 'verPuestos' && $permisos->validarPermiso('verPuestos')  ?  include "./sections/mantenimientos/view/listadoPuestos.php" : false;
    $_GET['section'] == 'tipoAccion' && $permisos->validarPermiso('tipoAccion')  ?  include "./sections/mantenimientos/view/accionesPersonal.php" : false;
    $_GET['section'] == 'proyectos' && $permisos->validarPermiso('proyectos')  ?  include "./sections/mantenimientos/view/proyectos.php" : false;
    $_GET['section'] == 'condicionTrabajo' && $permisos->validarPermiso('condicionTrabajo')  ?  include "./sections/mantenimientos/view/condicionesTrabajo.php" : false;
    $_GET['section'] == 'remuneraciones' && $permisos->validarPermiso('remuneraciones')  ?  include "./sections/mantenimientos/view/remuneraciones.php" : false;
    $_GET['section'] == 'permisos' && $permisos->validarPermiso('permisos')  ?  include "./sections/mantenimientos/view/permisos.php" : false;


    /* Accion de personal */
    $_GET['section'] == 'solicitudAccion' && $permisos->validarPermiso('solicitudAccion')  ?  include "./sections/accionPersonal/views/solicitudAccion.php" : false;
    $_GET['section'] == 'estadoSolicitud' && $permisos->validarPermiso('estadoSolicitud')  ?  include "./sections/accionPersonal/views/estadoSolicitud.php" : false;
    $_GET['section'] == 'aprobarSolicitudes' && $permisos->validarPermiso('aprobarSolicitudes')  ?  include "./sections/accionPersonal/views/aprobarSolicitudes.php" : false;
    $_GET['section'] == 'visorSolicitudes' && $permisos->validarPermiso('visorSolicitudes')  ?  include "./sections/accionPersonal/views/visorSolicitudes.php" : false;
    $_GET['section'] == 'solicitudesPendientes' && $permisos->validarPermiso('solicitudesPendientes')  ?  include "./sections/accionPersonal/views/solicitudesPendientes.php" : false;
    $_GET['section'] == 'solicitudesPorAprobar' && $permisos->validarPermiso('solicitudesPorAprobar')  ?  include "./sections/accionPersonal/views/solicitudesPorAprobar.php" : false;
    $_GET['section'] == 'verTodo' && $permisos->validarPermiso('verTodo')  ?  include "./sections/accionPersonal/views/verTodas.php" : false;


    /* Seguro Médico */
    $_GET['section'] == 'docs' && $permisos->validarPermiso('docs')  ?  include "./sections/seguro/views/docs.php" : false;
    $_GET['section'] == 'prueba'   ?  include "./examples/guardarImagen.php" : false;
}




?>