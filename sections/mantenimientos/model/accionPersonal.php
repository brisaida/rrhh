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
            
            $sql = "INSERT INTO rrhh.tipoAccionesPersonal(nombre,descripcion) 
                    VALUES(:nombre,:descripcion) ";
            $stmt = $this->conn->prepare($sql);


            $stmt->bindParam(":nombre", $losDatos->nombre);
            $stmt->bindParam(":descripcion", $losDatos->descripcion);

            
            try {
                # Iniciamos una transacción.
                $this->conn->beginTransaction();                
                
                echo $stmt->execute(); 
                $resultado = "exito";   
            } catch (PDOException $e) {
                //$this->conn->rollBack();
                $res = $stmt->errorInfo();           
                $resultado = json_encode($res);                             
            }
            
            $stmt->closeCursor();
            return $resultado;
        }
    }
    
?>