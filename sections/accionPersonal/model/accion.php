<?php

class mdlAccion
{

    // Variables globales
    public $conn;

    // Constructores
    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->dbConnect();

        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function buscarInfo($id)
    {

        $sql = "SELECT	e.idEmpleado,
                        CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.primerApellido,' ',e.segundoApellido) as nombreCompleto,
                        h.codigoEmpleado,
                        h.ingreso,
                        hd.idTDR,
                        p.nombrePuesto,
                        hd.idDepartamento,
                        dp.Descripcion,
                        hd.idJefe,
                        (SELECT CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido) FROM rrhh.empleados WHERE idEmpleado=hd.idJefe) as jefe,
                        (SELECT emailAsignado FROM rrhh.historial WHERE idEmpleado=hd.idJefe) as emailJefe,
                        hd.idProyecto,
                        pro.nombre as proyecto,
                        h.emailAsignado as correo,
						h.idUsuario,
						u.accesoUsuario
                FROM rrhh.empleados e
                INNER JOIN rrhh.historial h ON h.idEmpleado=e.idEmpleado
                INNER JOIN rrhh.historialDetalle hd ON hd.idHistorial=h.idHistorial
                INNER JOIN rrhh.puestos p ON p.idPuesto=hd.idTDR
                INNER JOIN configuracion.tblDepartamentosEstados dp ON dp.idDepartamento=hd.idDepartamento
                INNER JOIN bosque.proyecto pro ON pro.id=hd.idProyecto
				LEFT JOIN seguridad.tblUsuarios u ON u.idUsuario=h.idUsuario
                WHERE e.idEmpleado=:id
         ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function agregarAccionPersonal($datos)
    {


        $desde = new DateTime($datos->desde);
        $desdeFormateado = $desde->format('Y-m-d H:i:s');
        $hasta = new DateTime($datos->hasta);
        $hastaFormateado = $hasta->format('Y-m-d H:i:s');

        $sql = "INSERT INTO rrhh.accionPersonal(idEmpleado,fechaSolicitud,tipoAccion,cantidadDias,Comentarios,desde,hasta,usuarioCreado)
                VALUES(:id,:fechaSolicitud,:tipoAccion,:cantidadDias,:Comentarios,:desde,:hasta,:usuarioCreado)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $datos->idEmpleado);
        $stmt->bindParam(":fechaSolicitud", $datos->solicitud);
        $stmt->bindParam(":tipoAccion", $datos->tipo);
        $stmt->bindParam(":cantidadDias", $datos->dias);
        $stmt->bindParam(":Comentarios", $datos->comentarios);
        $stmt->bindParam(":desde", $desdeFormateado);
        $stmt->bindParam(":hasta", $hastaFormateado);
        $stmt->bindParam(":usuarioCreado", $_SESSION['usuario']);
        try {
            $stmt->execute();
            $resultado = true;

            setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
            $desde = new DateTime($datos->desde); // o tu objeto DateTime existente
            $desdeFormateado= strftime('%A, %d de %B de %Y', $desde->getTimestamp());
            $hasta = new DateTime($datos->hasta); // o tu objeto DateTime existente
            $hastaFormateado= strftime('%A, %d de %B de %Y', $hasta->getTimestamp());
            $solicitud = new DateTime($datos->solicitud); // o tu objeto DateTime existente
            $solicitudFormateado= strftime('%A, %d de %B de %Y', $solicitud->getTimestamp());

            /* $desde = new DateTime($datos->desde);
            $desdeFormateado = $desde->format('l, d F Y');
            $hasta = new DateTime($datos->hasta);
            $hastaFormateado = $hasta->format('l, d F Y');
 */
            $de = "rrhh@honducafeproyectos.com";
            $nombreDe = "Recursos Humanos Fundación COHONDUCAFE";
            $para =  $datos->correo; 
            $nombrePara =  $datos->nombreCompleto; 
            $asunto = "Acción de Personal";
            $nombreEmpleado =$datos->nombreCompleto; ;
            $motivo=$datos->permiso; ;
            $fechaDesde=$desdeFormateado; ;
            $fechaHasta=$hastaFormateado; ;
            $fechaSolicitud=$solicitudFormateado ;
            $dias=$datos->dias; 

            include '../../../assets/sendGrid/enviar_correo.php';

            // Llama a la función enviarCorreo
            $resultadoCorreo = enviarCorreo($de, $nombreDe, $para, $nombrePara, $asunto, $nombreEmpleado,$motivo,$fechaDesde,$fechaHasta,$fechaSolicitud,$dias);
            $resultado = $resultadoCorreo;
            $para =  $datos->correoJefe; 
            $nombrePara =  $datos->nombreCompleto; 
            $resultadoCorreo = enviarCorreo($de, $nombreDe, $para, $nombrePara, $asunto, $nombreEmpleado,$motivo,$fechaDesde,$fechaHasta,$fechaSolicitud,$dias);
            $resultado = $resultadoCorreo;

        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;


    }

    public function cargarTipoAccion()
    {

        $sql = "SELECT idAccion,accion,diasPermiso FROM rrhh.tipoAccion";

        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    public function cargasMisSolicitudesPorAprobar($id,$estado)
    {
        $sql = "SELECT	CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido) as nombreCompleto,
                        idAccionPersonal,
                        fechaSolicitud,
                        cantidadDias,
                        desde,
                        hasta,
                        ta.accion,
                        a.estado,
                        e.idEmpleado
                FROM rrhh.accionPersonal a
                INNER JOIN rrhh.empleados e on e.idEmpleado=a.idEmpleado
                INNER JOIN rrhh.historial h on h.idEmpleado=e.idEmpleado
                INNER JOIN rrhh.historialDetalle hd ON hd.idHistorial=h.idHistorial
                INNER JOIN rrhh.tipoAccion ta ON ta.idAccion=a.tipoAccion
                WHERE idJefe=:id AND a.estado=:estado ORDER BY a.fechaCreado DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":estado", $estado);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function visorSolicitudes($id)
    {
        $sql = "SELECT	CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido) as nombreCompleto,
                        idAccionPersonal,
                        fechaSolicitud,
                        cantidadDias,
                        desde,
                        hasta,
                        ta.accion,
                        a.estado,
                        e.idEmpleado
                FROM rrhh.accionPersonal a
                INNER JOIN rrhh.empleados e on e.idEmpleado=a.idEmpleado
                INNER JOIN rrhh.historial h on h.idEmpleado=e.idEmpleado
                INNER JOIN rrhh.historialDetalle hd ON hd.idHistorial=h.idHistorial
                INNER JOIN rrhh.tipoAccion ta ON ta.idAccion=a.tipoAccion
                WHERE idJefe=:id AND a.estado!=1 ORDER BY a.fechaCreado DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function cargasMisSolicitudes($id)
    {
        $sql = "SELECT idAccionPersonal,fechaSolicitud,tipoAccion,tp.accion,cantidadDias,comentarios,desde,hasta,estado
                FROM rrhh.accionPersonal ap
                INNER JOIN rrhh.tipoAccion tp ON tp.idAccion=ap.tipoAccion
                WHERE idEmpleado=:id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function solicitudesPendientes()
    {
        $sql = "SELECT	ap.idAccionPersonal,
                        ap.fechaSolicitud,
                        ap.tipoAccion,
                        tp.accion,
                        ap.cantidadDias,
                        ap.comentarios,
                        ap.desde,
                        ap.hasta,
                        ap.estado,
                        ap.idEmpleado,
                        CONCAT (primerNombre,' ',segundoNombre,' ',primerApellido) AS nombreCompleto,
                        hd.idProyecto,
                        p.nombre proyecto,
                        hd.idJefe,
                        (SELECT CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido) FROM rrhh.empleados WHERE idEmpleado=hd.idJefe) as jefe,
                        hd.idTDR,
                        pu.nombrePuesto
                FROM rrhh.accionPersonal ap
                INNER JOIN rrhh.tipoAccion tp ON tp.idAccion=ap.tipoAccion
                INNER JOIN rrhh.empleados e ON e.idEmpleado=ap.idEmpleado
                LEFT JOIN rrhh.historial h ON h.idEmpleado	= e.idEmpleado
                LEFT JOIN rrhh.historialDetalle hd ON hd.idHistorial= h.idHistorial
                LEFT JOIN bosque.proyecto p ON p.id=hd.idProyecto
                LEFT JOIN rrhh.puestos pu ON pu.idPuesto=hd.idTDR
                WHERE ap.estado=1";

        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    public function cambiarEstado($id,$estado,$comentarios)
    {
        $fechaHoraActual = date('Y-m-d H:i:s');
        $sql = "UPDATE rrhh.accionPersonal
                SET estado=:estado,
                    ComentariosN1=:comentarios,
                    fechaAprobadoN1=:fecha,
                    AprobadoN1=:usuario
                WHERE idAccionPersonal=:id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":estado", $estado);
        $stmt->bindParam(":comentarios", $comentarios);
        $stmt->bindParam(":fecha", $fechaHoraActual);
        $stmt->bindParam(":usuario",$_SESSION['usuario']);
        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function cargarSolicitudesPorId($id)
    {
        $sql = "SELECT	idAccionPersonal,
                        fechaSolicitud,
                        tipoAccion,
                        tp.accion,
                        cantidadDias,
                        comentarios,
                        desde,
                        hasta,
                        ap.estado,
                        ap.idEmpleado,
                        (SELECT CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido) FROM rrhh.empleados WHERE idEmpleado=ap.idEmpleado) as empleado,
                        ap.fechaCreado,
                        ap.usuarioCreado,
                        AprobadoN1,
                        (SELECT CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido) FROM rrhh.empleados WHERE idEmpleado=ap.AprobadoN1) as jefeInmediato,
                        fechaAprobadoN1,
                        fechaAprobadoN2,
                        AprobadoN2,
                        (SELECT CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido) FROM rrhh.empleados WHERE idEmpleado=ap.AprobadoN2) as RHHH
                FROM rrhh.accionPersonal ap
                INNER JOIN rrhh.tipoAccion tp ON tp.idAccion=ap.tipoAccion
                INNER JOIN rrhh.empleados e ON e.idEmpleado=ap.idEmpleado
                WHERE ap.idAccionPersonal=:id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    
}
