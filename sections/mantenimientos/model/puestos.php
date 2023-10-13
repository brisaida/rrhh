<?php

class mdlPuestos
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



    // *Listar proyectos
    public function listarProyectos()
    {

        $sql = "SELECT id, codigo, nombre FROM bosque.proyecto";

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
