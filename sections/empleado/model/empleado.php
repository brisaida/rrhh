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


    public function agregarRegistro($datosGenerales, $datosParentesco, $datosSalud, $datosEducacion, $datosEstudiosActuales, $datosHistorialLaboral, $datosReferencias, $datosIdiomas)
    {

        echo '<pre>';
        print_r($datosGenerales);
        echo '</pre>';

        $sql = "INSERT INTO rrhh.empleados(	DNI,primerNombre,segundoNombre,primerApellido,segundoApellido,telefono,fechaNacimiento,lugarNacimiento,nacionalidad,estadoCivil,genero,email,estado,usuarioCreado,cuentaBancaria,vencimientoPasaporte,vencimientoLicencia,vencimientoLicenciaMoto) 
            VALUES(	:dni,:primerNombre,:segundoNombre,:primerApellido,:segundoApellido,:tel,:fechaNacimiento,:lugarNacimiento,:nacionalidad,:estadoCivil,:genero,:correo,1,:usuario,:cuentaBancaria,:pasaporte,:licenciaCarro,:licenciaMoto);";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":dni", $datosGenerales->id);
        $stmt->bindParam(":primerNombre", $datosGenerales->primerNombre);
        $stmt->bindParam(":segundoNombre", $datosGenerales->segundoNombre);
        $stmt->bindParam(":primerApellido", $datosGenerales->primerApellido);
        $stmt->bindParam(":segundoApellido", $datosGenerales->segundoApellido);
        $stmt->bindParam(":fechaNacimiento", $datosGenerales->fechaNacimiento);
        $stmt->bindParam(":lugarNacimiento", $datosGenerales->lugarNacimiento);
        $stmt->bindParam(":tel", $datosGenerales->telefono);
        $stmt->bindParam(":nacionalidad", $datosGenerales->nacionalidad);
        $stmt->bindParam(":estadoCivil", $datosGenerales->estadoCivil);
        $stmt->bindParam(":genero", $datosGenerales->genero);
        $stmt->bindParam(":correo", $datosGenerales->email);
        $stmt->bindParam(":usuario", $datosGenerales->usuario);
        $stmt->bindParam(":cuentaBancaria", $datosGenerales->cuentaBancaria);
        $stmt->bindParam(":pasaporte", $datosGenerales->pasaporte);
        $stmt->bindParam(":licenciaCarro", $datosGenerales->licenciaCarro);
        $stmt->bindParam(":licenciaMoto", $datosGenerales->licenciaMoto);

        try {
            # Iniciamos una transacción.
            $this->conn->beginTransaction();
            $stmt->execute();
            $this->conn->commit();

            # Captura del ultimo id insertado
            $idEmpleado = $this->conn->lastInsertId();

            # Agregamos la dirección
            $sqlDireccion = "INSERT INTO rrhh.direcciones(idEmpleado,direccion,latitud,longitud,usuarioCreado) 
                    VALUES(:id,:direccion,:latitud,:longitud,:usuario);";

            $stmt = $this->conn->prepare($sqlDireccion);
            $stmt->bindParam(":id", $idEmpleado);
            $stmt->bindParam(":direccion", $datosGenerales->direccion);
            $stmt->bindParam(":latitud", $datosGenerales->lat);
            $stmt->bindParam(":longitud", $datosGenerales->long);
            $stmt->bindParam(":usuario", $datosGenerales->usuario);

            try {
                $stmt->execute();                
                               
            } catch (PDOException $e) {
                
                $this->conn->rollBack();
                $res = $stmt->errorInfo();           
                $resultado = json_encode($res);                                 
            }

            foreach ($datosParentesco->parentesco as $parentesco) {
                $sqlParentesco = "INSERT INTO rrhh.historiaFamiliar(idEmpleado, nombre,parentesco,fechaNacimiento,direccion,telefono,usuarioCreado)
                                VALUES (:id,:nombre,:parentesco,:fechaNacimiento,:direccion,:telefono,:usuario)"; 
                $stmt = $this->conn->prepare($sqlParentesco);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":nombre", $datosGenerales->nombreCompleto);
                $stmt->bindParam(":parentesco", $datosGenerales->parentesco);
                $stmt->bindParam(":fechaNacimiento", $datosGenerales->fechaNacimiento);
                $stmt->bindParam(":direccion", $datosGenerales->direccion);
                $stmt->bindParam(":telefono", $datosGenerales->telefono);
                $stmt->bindParam(":usuario", $datosGenerales->usuario);

                try {
                    $stmt->execute();                
                                   
                } catch (PDOException $e) {
                    
                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();           
                    $resultado = json_encode($res);                                 
                }
            }

        } catch (PDOException $e) {
            //$this->conn->rollBack();
            $res = $stmt->errorInfo();
            $resultado = json_encode($res);
            echo $resultado;
        }
        $stmt->closeCursor();
    }
}
