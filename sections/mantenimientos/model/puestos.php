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

    public function listarPuestosPorProyectos($id)
    {

        $sql = "SELECT idDirector,puesto 
                FROM rrhh.puestosDirectores 
                WHERE proyecto=:id
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
    public function listarPuestosGerentes($id)
    {

        $sql = "SELECT idDirector as id, puesto, 'puestosDirectores' AS Origen 
                FROM rrhh.puestosDirectores WHERE proyecto=:id
                UNION
                SELECT idAdministrativos, puesto, 'puestosAdministrativos' AS Origen 
                FROM rrhh.puestosAdministrativos WHERE proyecto=:id1
                ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":id1", $id);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();


        return $resultado;
    }

    public function AgregarGerentes($losDatos){
            
        $sql = "INSERT INTO rrhh.puestosGerentes(puesto,proyecto,usuarioCreado,dependencia)
        VALUES (:puesto,:proyecto,:usuario,:dependencia)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":puesto", $losDatos->puesto);
        $stmt->bindParam(":proyecto", $losDatos->proyecto);
        $stmt->bindParam(":dependencia", $losDatos->dependencia);
        $stmt->bindParam(":usuario", $losDatos->usuario);
       
        try {
            # Iniciamos una transacción.
            $this->conn->beginTransaction();                 
            $resultado = $stmt->execute(); 
            $this->conn->commit();


        } catch (PDOException $e) {
            //$this->conn->rollBack();
            $res = $stmt->errorInfo();           
            $resultado = json_encode($res);  
        }
        
        $stmt->closeCursor();
        return $resultado;
    }
    public function agregarAdmin($losDatos){
            
        $sql = "INSERT INTO rrhh.puestosAdministrativos(puesto,proyecto,usuarioCreado,dependencia)
        VALUES (:puesto,:proyecto,:usuario,:dependencia)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":puesto", $losDatos->puesto);
        $stmt->bindParam(":proyecto", $losDatos->proyecto);
        $stmt->bindParam(":dependencia", $losDatos->dependencia);
        $stmt->bindParam(":usuario", $losDatos->usuario);
       
        try {
            # Iniciamos una transacción.
            $this->conn->beginTransaction();                 
            $resultado = $stmt->execute(); 
            $this->conn->commit();


        } catch (PDOException $e) {
            //$this->conn->rollBack();
            $res = $stmt->errorInfo();           
            $resultado = json_encode($res);  
        }
        
        $stmt->closeCursor();
        return $resultado;
    }

    public function agregarRegistro($losDatos){
            
        $sql = "INSERT INTO rrhh.puestosDirectores(puesto,proyecto,usuarioCreado)
        VALUES (:puesto,:proyecto,:usuario)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":puesto", $losDatos->puesto);
        $stmt->bindParam(":proyecto", $losDatos->proyecto);
        $stmt->bindParam(":usuario", $losDatos->usuario);
       



        try {
            # Iniciamos una transacción.
            $this->conn->beginTransaction();                 
            $resultado = $stmt->execute(); 
            $this->conn->commit();


        } catch (PDOException $e) {
            //$this->conn->rollBack();
            $res = $stmt->errorInfo();           
            $resultado = json_encode($res);  
        }
        
        $stmt->closeCursor();
        return $resultado;
    }


}
