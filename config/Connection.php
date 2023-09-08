<?php
    class Connection{
        public function dbConnect(){
            try {
                $serverName = "simfcoh.cqx4pv8jnvji.us-east-2.rds.amazonaws.com";
                $database = "DBSIMFCOH_PRB"; 
                $user = 'adminSimfcoh2';
                $password = 'efundamaster2';

                // Instanciar la conexion con la base de datos
                $conn = new PDO("sqlsrv:server=$serverName; database=$database", $user, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Retornar la variable de conexion
             
                return $conn;
            } catch (PDOException $e) {
                // En caso de error
            echo "Error en conexion: " . $e->getMessage();
            }
        }
    }
/* 
    $conexion = new Connection();   
    $proyecto = $conexion->dbConnect();
    echo $proyecto; */



?>