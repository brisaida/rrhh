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
                        h.emailAsignado as correo
                FROM rrhh.empleados e
                INNER JOIN rrhh.historial h ON h.idEmpleado=e.idEmpleado
                INNER JOIN rrhh.historialDetalle hd ON hd.idHistorial=h.idHistorial
                INNER JOIN rrhh.puestos p ON p.idPuesto=hd.idTDR
                INNER JOIN configuracion.tblDepartamentosEstados dp ON dp.idDepartamento=hd.idDepartamento
                INNER JOIN bosque.proyecto pro ON pro.id=hd.idProyecto
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

        $sql = "SELECT idAccion,accion FROM rrhh.tipoAccion";

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

    public function cargasMisSolicitudesPorAprobar($id)
    {
        $sql = "SELECT	CONCAT(primerApellido,' ',segundoNombre,' ',primerApellido) as nombreCompleto,
                        idAccionPersonal,
                        fechaSolicitud,
                        cantidadDias,
                        desde,
                        hasta
                FROM rrhh.accionPersonal a
                INNER JOIN rrhh.empleados e on e.idEmpleado=a.idEmpleado
                INNER JOIN rrhh.historial h on h.idEmpleado=e.idEmpleado
                INNER JOIN rrhh.historialDetalle hd ON hd.idHistorial=h.idHistorial
                WHERE idJefe=:id AND a.estado=1";

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
    
}
