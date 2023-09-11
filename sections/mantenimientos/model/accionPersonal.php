<?php


    class mdlAccionPersonal{
        // Variables globales
        public $conn;

        // Constructores
        public function __construct(){
            $this->conn = new Connection();
            $this->conn = $this->conn->dbConnect();
            
           /*  if (!isset($_SESSION)) {
                session_start();
                
            } */
        }


        public function agregarRegistro($losDatos){
            
            $sql = "insert into rrhh.tipoAccionesPersonal(nombre,descripcion) 
                    values(:nombre,:descripcion) ";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":nombre", $losDatos->nombre);
            $stmt->bindParam(":descripcion", $losDatos->descripcion);
           



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

        
        public function listarRegistros(){
            $sql = "SELECT *FROM rrhh.tipoAccionesPersonal";
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
    
?>