<?php

class mdlEmpleado
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

    public function cargarZonas()
    {

        $sql = "SELECT idDepartamento, descripcion FROM configuracion.tblDepartamentosEstados";

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
    public function cargarUsuarios()
    {

        $sql = "SELECT idUsuario,accesoUsuario FROM seguridad.tblUsuarios WHERE estadoCuenta=1 ORDER BY accesoUsuario";

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
    public function cargarEmpleados()
    {

        $sql = "SELECT	idEmpleado,
                        CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido,' ',segundoApellido) nombreCompleto
                FROM rrhh.empleados
                ORDER BY nombreCompleto";

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
}
