<?php

    class mdlUsuario{
        // Variables globales
        public $conn;

        // Constructores
        public function __construct(){
            $this->conn = new Connection();
            $this->conn = $this->conn->dbConnect();
            
            if (!isset($_SESSION)) {
                session_start();
                
            }
        }

        /**
         * Método para agregar un nuevo registro
         * @param-> $losDatos: infromación de registro obtenida del formulario. 
         * @return-> 200 (guardaro) | error message
        */
        public function agregarRegistro($losDatos){
            #variables generales
            $estado = 1;
            $errorDetalle=0;

            $encriptada = password_hash($losDatos->password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO bosque.usuario(nombreEmpleado,telefono,Cargo,username,password,tipoAcceso,estado)
                        VALUES(:nombreEmpleado,:telefono,:Cargo,:username,:password,:tipoAcceso,:estado)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":nombreEmpleado", $losDatos->nombreEmpleado);
            $stmt->bindParam(":telefono", $losDatos->telefono);
            $stmt->bindParam(":Cargo", $losDatos->Cargo);         
            $stmt->bindParam(":username", $losDatos->username);  
            $stmt->bindParam(":password", $encriptada); 
            $stmt->bindParam(":tipoAcceso", $losDatos->tipoAcceso); 
            $stmt->bindParam(":estado", $estado);

            try {
                $this->conn->beginTransaction(); 
                $stmt->execute();

                $idUsuario = $this->conn->lastInsertId();


                if(!empty($losDatos->permisos)){

                    foreach ($losDatos->permisos as $detalle) {

                        $sqlDetalle = "INSERT INTO bosque.permisoUsuario(submodulo,usuario,estado,creadoPor,fechaCreado)
                                            VALUES(:submodulo,:usuario,:estado,:creadoPor,SYSDATETIME())";
                        $stmt = $this->conn->prepare($sqlDetalle);
                        $stmt->bindParam(":submodulo", $detalle['submodulo']);
                        $stmt->bindParam(":usuario", $idUsuario);
                        $stmt->bindParam(":estado", $estado);            
                        $stmt->bindParam(":creadoPor", $_SESSION['usuario']);
                        $stmt->bindParam(":estado", $estado);

                        try {
                            $stmt->execute();  
                                    
                        } catch (PDOException $e) {                  
                            $errorDetalle = $errorDetalle+1;
                            $res = $stmt->errorInfo();    
                            $resultado = json_encode($res);  
                            $this->conn->rollBack();                                 
                        }
                      
                    }                    
                }

                if($errorDetalle ==0){
                    $this->conn->commit();
                    $response[0] = array(
                        'status'  => '200',
                        'mensaje' => 'Usuario registrado correctamente',                              
                    );    
                }
                           
                $resultado = json_encode($response);               

            } catch (PDOException $e) {
                $res = $stmt->errorInfo();           
                $resultado = json_encode($res);
                             
            }
            
            $stmt->closeCursor();
            echo $resultado;
            return $resultado;
        }

        /**
         * Método para listar los registros habilitados.
         * @return -> listaEspecies
        */
        public function listarRegistros(){
            $sql = "SELECT
                       id, nombreEmpleado,telefono,Cargo,username,tipoAcceso,estado
                    FROM
                        bosque.usuario
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

        /**
         * Método para cargar información de un Registro.
         * @param-> $idTipo: id de la especie a consultar. 
         * @return->$resultadp ?lista de los datos encontrados
        */
        public function obtenerRegistro($idEspecie){
            $sql = "SELECT * FROM bosque.especiePlanta WHERE id =:id and estado =1";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $idEspecie);
            
            try {
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $e) {
                $resultado = $e->getMessage();
            }
            $stmt->closeCursor();
            return $resultado;
        }

        /**
         * Método para actualizar datos de un registro
         * @param-> $losDatos: datos obtenidos del formulario
         * @return -> 200 ok | error message
        */
        public function actualizarRegistro($losDatos){           

            $sql = "UPDATE 
                        bosque.especiePlanta
                    SET
                        nombreComun =:nombreComun,
                        nombreCientifico =:nombreCientifico,
                        descripcion =:descripcion,
                        tipoPlanta =:tipoPlanta,
                        fechaModificado = SYSDATETIME(),
                        modificadoPor = :modificadoPor
                    WHERE
                        id =:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":nombreComun", $losDatos->nombreComun);
            $stmt->bindParam(":nombreCientifico", $losDatos->nombreCientifico);
            $stmt->bindParam(":descripcion", $losDatos->descripcion);  
            $stmt->bindParam(":tipoPlanta", $losDatos->tipoPlanta);         
            $stmt->bindParam(":modificadoPor", $_SESSION['usuario']);
            $stmt->bindParam(":id", $losDatos->id);

            try {
                $stmt->execute();
                $response[0] = array(
                    'status'  => '200',
                    'mensaje' => 'Especie actualizada correctamente.',
                );           
                $resultado = json_encode($response);                
               
            } catch (PDOException $e) {
                $res = $stmt->errorInfo();           
                $resultado = json_encode($res);              
            }
            $stmt->closeCursor();
            echo $resultado;
            return $resultado;
        }

        /**
         * Método para inhabilitar un Técnico.
         * @param-> $id: id del la especie seleccionado.
         * @return-> 200 ok| error message
        */
        public function inhabilitarRegistro($id){      
            $estado = 2;

            $sql = "UPDATE 
                       bosque.usuario
                    SET 
                        estado = 2
                                               
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);

            try {
                $stmt->execute();


                $sql2 ="UPDATE bosque.permisoUsuario SET estado =:estado, fechaModificado =SYSDATETIME(), modificadoPor =:modificadoPor WHERE usuario=:id";
                $stmt = $this->conn->prepare($sql2);
                $stmt->bindParam(":estado", $estado);
                $stmt->bindParam(":modificadoPor", $_SESSION['usuario']);
                $stmt->bindParam(":id", $id);
                $stmt->execute();

                
                $response[0] = array(
                    'status'  => '200',
                    'mensaje' => 'Usuario inhabilitado correctamente.',
                );           
                $resultado = json_encode($response);
                echo $resultado;
               
            } catch (PDOException $e) {
                $resultado = $e->getMessage();
                echo $resultado;
            }
            $stmt->closeCursor();
            return $resultado;
        }


        /**
         * Método para listar los módulos habilitados.
         * @return -> listaEspecies
        */
        public function cargarModulos(){
            $sql = "SELECT * FROM bosque.modulo WHERE estado =1 ORDER BY nombre ASC";
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

        /**
         * Método para listar submodulos por modulos
         * @return -> listaEspecies
        */
        public function cargarSubmodulos(){
            $sql = "SELECT * FROM bosque.submodulo WHERE estado =1  ORDER BY nombre DESC";            
            $stmt = $this->conn->prepare($sql);
            //$stmt->bindParam(":id", $id);

            try {
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $e) {
                $resultado = $e->getMessage();
            }
            $stmt->closeCursor();
            return $resultado;
        }



        function validarUsuario($username){			

			# variabele en donde estara sentencia SQL
			$sql = "SELECT TOP 1
                        id,nombreEmpleado,telefono,Cargo,password,tipoAcceso,estado
                    FROM
                        bosque.usuario
                    WHERE 
                        username =:usuario and estado =1";

					# se prepara el stament para la ejecucion de la consulta
                    $stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":usuario", $username);		
			try {
				# ejecutamos el stament
				$stmt->execute();
				# solicitamos la consulta en un arreglo asociativo
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			} catch (PDOException $e) {
				# capturamos el error
				$result = $stmt->errorInfo();
			}
			# libera la conexion con la base de datos

			$stmt->closeCursor();

			# retornamos el resultado de la consulta.
			return $result;
		}


        function vaidarPermiso($modulo){
            if($_SESSION['tipoAcceso'] =='1'){
                return true;
            }else{
                $sql= "SELECT * FROM bosque.permisoUsuario 
                            INNER JOIN bosque.submodulo ON bosque.permisoUsuario.submodulo = bosque.submodulo.id 
                        WHERE usuario =:id and bosque.permisoUsuario.estado =1";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id", $_SESSION['id']);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $arrayPermisos = [];
                foreach ($resultado as $perm => $value) {  
                    array_push($arrayPermisos, $value['ruta']);
                }

                $resultado = in_array($modulo,$arrayPermisos) == 1 ? true : false;

                if($resultado == false){
                    include "./modules/home/views/sinPermiso.php";
                }
            }

            return $resultado;
        }

        function validarUsuarioSIMFCO($id){
            $sql1 ="SELECT	e.idEmpleado as id,
                            CONCAT(e.primerNombre,' ',e.primerApellido) AS nombreEmpleado,
                            h.codigoEmpleado,
                            e.telefono,
                            h.idUsuario,
                            h.superUsuario AS tipoAcceso,
                            u.accesoUsuario AS username,
                            hd.manejaPersonal,
							hd.perteneceRRHH
                    FROM rrhh.empleados e
                    LEFT JOIN rrhh.historial h on e.idEmpleado=h.idEmpleado
                    LEFT JOIN rrhh.historialDetalle hd on hd.idHistorial=h.idHistorial
                    LEFT JOIN seguridad.tblUsuarios u on u.idUsuario=h.idUsuario
                    WHERE h.idUsuario=:id";
            $stmt = $this->conn->prepare($sql1);
            $stmt->bindParam(":id", $id);          

            try {
				# ejecutamos el stament
				$stmt->execute();
				# solicitamos la consulta en un arreglo asociativo
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			} catch (PDOException $e) {
				# capturamos el error
				$result = $stmt->errorInfo();
			}
			# libera la conexion con la base de datos

			$stmt->closeCursor();

			# retornamos el resultado de la consulta.
            

            if($result){
                foreach ($result as $usu) {              
                        session_start();					
                        $_SESSION['id']=$usu['id'];
                        $_SESSION['username']=$usu['username'];
                        $_SESSION['nombreEmpleado'] = $usu['nombreEmpleado'];
                        $_SESSION['telefono']=$usu['telefono'];
                        $_SESSION['Cargo']=$usu['Cargo'];
                        $_SESSION['tipoAcceso']=$usu['tipoAcceso'];		
                        $_SESSION['RRHH']=$usu['perteneceRRHH'];		
                        $_SESSION['manejaPersonal']=$usu['manejaPersonal'];		
                        $_SESSION['usuario']=$usu['id'];			
                        $_SESSION['codigoEmpleado']=$usu['codigoEmpleado'];					
                   
                    
                }
                return true;
            }else{
                return false;
            }


			

        }


        

      
    }
    
?>