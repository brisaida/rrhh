<?php


class mdlPermisos
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




    public function cargarSubmodulos($id)
    {
        $sql = "SELECT *FROM rrhh.submodulo where estado=1 AND modulo=:id";
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
    public function cargarModulos()
    {
        $sql = "SELECT *FROM rrhh.modulo where estado=1";
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
    public function infoEmpleado($id)
    {
        $sql = "SELECT p.nombrePuesto,pro.nombre
                    FROM rrhh.historial h
                    LEFT JOIN rrhh.historialDetalle hd ON h.idHistorial=hd.idHistorial
                    LEFT JOIN rrhh.puestos p ON p.idPuesto=hd.idTDR
                    LEFT JOIN bosque.proyecto pro ON pro.id=hd.idProyecto
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
    public function agregarPermisos($id,$estado,$submodulo)
    {
        $sql = "EXEC rrhh.agregarPermisos 
                @idEmpleado = :empleado ,
                @submodulo = :submodulo,
                @usuario = :usuario,
                @estado = :estado ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":empleado", $id);
        $stmt->bindParam(":submodulo", $submodulo);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);
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
    public function cargarPermisos($id)
    {
        $sql = "SELECT id, submodulo, estado FROM rrhh.permisos WHERE idEmpleado=:id";
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
