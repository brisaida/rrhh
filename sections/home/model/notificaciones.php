<?php

class mdlNotificaciones
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



    // *Listar cumpleañeros
    public function listarCumples()
    {

        $sql = "    SELECT  CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido)as nombreCompleto
                    FROM rrhh.empleados
                    WHERE DATEPART(day, fechaNacimiento) = DATEPART(day, GETDATE())
                    AND DATEPART(month, fechaNacimiento) = DATEPART(month, GETDATE());
                    ";

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
