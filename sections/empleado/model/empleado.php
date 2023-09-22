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


    public function agregarRegistro($datosGenerales, $datosParentesco, $datosParentescoConocidos, $datosSalud, $datosEducacion, $datosEstudiosActuales, $datosHistorialLaboral, $datosReferencias, $datosIdiomas, $conocidos, $actual)
    {

        echo '<pre>';
        print_r($datosEstudiosActuales);
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

            # Agregar información de parentesco
            foreach ($datosParentesco as $parentesco) {
                $sqlParentesco = "INSERT INTO rrhh.historiaFamiliar(idEmpleado, nombre,parentesco,fechaNacimiento,direccion,telefono,usuarioCreado)
                                VALUES (:id,:nombre,:parentesco,:fechaNacimiento,:direccion,:telefono,:usuario)";
                $stmt = $this->conn->prepare($sqlParentesco);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":nombre", $parentesco['nombreCompleto']);
                $stmt->bindParam(":parentesco", $parentesco['parentesco']);
                $stmt->bindParam(":fechaNacimiento", $parentesco['fechaNacimiento']);
                $stmt->bindParam(":direccion", $parentesco['direccion']);
                $stmt->bindParam(":telefono", $parentesco['telefono']);
                $stmt->bindParam(":usuario", $datosGenerales->usuario);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }

            #Agregar información de las personas conocidas dentro de la empresa
            if ($conocidos == 1) {
                foreach ($datosParentescoConocidos as $conocidos) {
                    $sqlParentesco = "  INSERT INTO rrhh.conocidos(idEmpleado,nombre,parentesco,tiempoConocerlo,empresaLabora,usuarioCreado)
                                        VALUES(:id,:nombre,:parentesco,:tiempoConocerlo,:empresa,:usuario)";
                    $stmt = $this->conn->prepare($sqlParentesco);
                    $stmt->bindParam(":id", $idEmpleado);
                    $stmt->bindParam(":nombre", $conocidos['nombre']);
                    $stmt->bindParam(":parentesco", $conocidos['parentesco']);
                    $stmt->bindParam(":tiempoConocerlo", $conocidos['tiempoConocerle']);
                    $stmt->bindParam(":empresa", $conocidos['empresa']);
                    $stmt->bindParam(":usuario", $datosGenerales->usuario);

                    try {
                        $stmt->execute();
                    } catch (PDOException $e) {

                        $this->conn->rollBack();
                        $res = $stmt->errorInfo();
                        $resultado = json_encode($res);
                    }
                }
            }


            #Agregar información de salud y enfermedades
            $sqlSalud = "   INSERT INTO rrhh.salud(idEmpleado,contactoEmergencia1,tel1,contactoEmergencia2,tel2,tipoSangre,enfermedades,medico,telMedico,centroMedico,usuarioCreado)
                                VALUES(:id,:emergencia1,:tel1,:emergencia2,:tel2,:sangre,:enfermedades,:medico,:telMedico,:centroMedico,:usuario)
                ";
            $stmt = $this->conn->prepare($sqlSalud);
            $stmt->bindParam(":id", $idEmpleado);
            $stmt->bindParam(":emergencia1", $datosSalud->emergencia1);
            $stmt->bindParam(":tel1", $datosSalud->tel1);
            $stmt->bindParam(":emergencia2", $datosSalud->emergencia2);
            $stmt->bindParam(":tel2", $datosSalud->tel2);
            $stmt->bindParam(":sangre", $datosSalud->tiposangre);
            $stmt->bindParam(":enfermedades", $datosSalud->enfermedades);
            $stmt->bindParam(":medico", $datosSalud->medico);
            $stmt->bindParam(":telMedico", $datosSalud->telMedico);
            $stmt->bindParam(":centroMedico", $datosSalud->centroMedico);
            $stmt->bindParam(":usuario", $datosGenerales->usuario);

            try {
                $stmt->execute();
            } catch (PDOException $e) {

                $this->conn->rollBack();
                $res = $stmt->errorInfo();
                $resultado = json_encode($res);
            }


            # Agregar información de la educación
            foreach ($datosEducacion as $educacion) {
                $sqlParentesco = "  INSERT INTO rrhh.educacion(idEmpleado,nivel,centroEducativo,estudio,desde,hasta,lugar,usuarioCreado)
                                    VALUES (:id,:nivel,:centroEducativo,:estudio,:desde,:hasta,:lugar,:usuario)";
                $stmt = $this->conn->prepare($sqlParentesco);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":nivel", $educacion['nivel']);
                $stmt->bindParam(":centroEducativo", $educacion['centroEducativo']);
                $stmt->bindParam(":estudio", $educacion['estudios']);
                $stmt->bindParam(":desde", $educacion['desde']);
                $stmt->bindParam(":hasta", $educacion['hasta']);
                $stmt->bindParam(":lugar", $educacion['lugar']);
                $stmt->bindParam(":usuario", $datosGenerales->usuario);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }




            # Agregar información de idiomas
            foreach ($datosIdiomas as $idiomas) {
                $sqlIdiomas = "  INSERT INTO rrhh.idiomas(idEmpleado,idioma,porcentaje,usuarioCreado)
                                VALUES(:id,:idioma,:porcentaje,:usuario)";
                $stmt = $this->conn->prepare($sqlIdiomas);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":idioma", $idiomas['idioma']);
                $stmt->bindParam(":porcentaje", $idiomas['porcentaje']);
                $stmt->bindParam(":usuario", $datosGenerales->usuario);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }
            if ($actual == 1) {
                #Agregar información de los estudios actuales
                $sqlEstudios = "INSERT INTO rrhh.estudiosActuales(idEmpleado,carrera,horaEntrada,horaSalida,finalizacion,usuarioCreado)
                            VALUES(:id,:carrera,:horaEntrada,:horaSalida,:finalizacion,:usuario)
                ";
                $stmt = $this->conn->prepare($sqlEstudios);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":carrera", $datosEstudiosActuales->carrera);
                $stmt->bindParam(":horaEntrada", $datosEstudiosActuales->desde);
                $stmt->bindParam(":horaSalida", $datosEstudiosActuales->hasta);
                $stmt->bindParam(":finalizacion", $datosEstudiosActuales->fechaFinalizacion);
                $stmt->bindParam(":usuario", $datosGenerales->usuario);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }
            # Agregar información laboral
            foreach ($datosHistorialLaboral as $historial) {
                $sqlHistorial = "   INSERT INTO rrhh.antecedentesLaborales(idEmpleado,empresa,tipoEmpresa,direccion,telefono,ultimoPuesto,jefeInmediato,telJefe,ingreso,retiro,sueldoInicial,sueldoFinal,causaRetiro,obligaciones,usuarioCreado)
                                    VALUES(:id,:empresa,:tipoEmpesa,:direccion,:telefono,:ultimoPuesto,:jefeInmediato,:telJefe,:ingreso,:retiro,:sueldoInicial,:sueldoFinal,:causaRetiro,:obligaciones,:usuario)";
                $stmt = $this->conn->prepare($sqlHistorial);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":empresa", $historial['empresa']);
                $stmt->bindParam(":tipoEmpesa", $historial['tipoEmpresa']);
                $stmt->bindParam(":direccion", $historial['direccionEmpresa']);
                $stmt->bindParam(":telefono", $historial['telEmpresa']);
                $stmt->bindParam(":ultimoPuesto", $historial['ultimoPuesto']);
                $stmt->bindParam(":jefeInmediato", $historial['nombreJefe']);
                $stmt->bindParam(":telJefe", $historial['telJefe']);
                $stmt->bindParam(":ingreso", $historial['fechaIngreso']);
                $stmt->bindParam(":retiro", $historial['fechaDeRetiro']);
                $stmt->bindParam(":sueldoInicial", $historial['sueldoInicial']);
                $stmt->bindParam(":sueldoFinal", $historial['sueldoFinal']);
                $stmt->bindParam(":causaRetiro", $historial['causaRetiro']);
                $stmt->bindParam(":obligaciones", $historial['descripcionPuesto']);
                $stmt->bindParam(":usuario", $datosGenerales->usuario);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }

            #Agregar referencias
            foreach ($datosReferencias as $referencias) {
                $sqlHistorial = "   INSERT INTO rrhh.referencias(idEmpleado,nombre,profesion,direccion,telefono,usuarioCreado )
                                    VALUES(:id,:nombre,:profesion,:direccion,:telefono,:usuario)";
                $stmt = $this->conn->prepare($sqlHistorial);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":nombre", $referencias['nombre']);
                $stmt->bindParam(":profesion", $referencias['profesion']);
                $stmt->bindParam(":direccion", $referencias['direccion']);
                $stmt->bindParam(":telefono", $referencias['telefono']);
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

            echo "resultdo consulta>" . $resultado . "<br>";
            echo $resultado;
        }
        $stmt->closeCursor();
    }
}
